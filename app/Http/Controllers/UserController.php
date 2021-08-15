<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Traits\Authorizable;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use Authorizable;

    public function index()
    {
        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];
        $users = User::all();

        return view('users.list_pengguna', compact('users'))->with($data);
    }

    public function create()
    {
        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        $users = User::latest()->paginate();
        $roles = Role::pluck('name', 'id');

        return view('users.create', compact('users', 'roles'))->with($data);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name'     => 'bail|required|min:2',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles'    => 'required|min:1',
        ]);

//        $request = $request->except(['roles', 'permissions']);
        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        $user = User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
            'status'   => $request->get('status') === '1' ? 1 : 0,
            'is_admin' => $request->get('roles') === '1' ? 1 : 0,
        ]);

        if ($user) {
            $this->syncPermissions($request, $user);
            flash('User has been created.');
        } else {
            flash()->error('Unable to create user.');
        }

        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        return redirect()->route('users.create')->with($data);
    }

    public function edit($id)
    {
        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('users.edit', compact('user', 'roles', 'permissions'))->with($data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required|min:1',
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except(['roles', 'permissions', 'password']));

        // check for password change
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();
        flash()->success('User has been updated.');

        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        return redirect()->route('users.index')->with($data);
    }

    public function show($id)
    {
        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        $users = User::all();

        return view('users.show')->with($data);
    }

    public function profil($id)
    {
        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        $users = User::find($id);

        return view('users.user_profile')->with($data);
    }

    public function account($id)
    {
        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        $users = User::find($id);

        return view('users.user_account_setting', compact('users'))->with($data);
    }

    public function destroy($id)
    {
        if (Auth::user()->id === $id) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();

            return redirect()->back();
        }

        if (User::findOrFail($id)->delete()) {
            flash()->success('User has been deleted');
        } else {
            flash()->success('User not deleted');
        }

        $data = [
            'category_name'    => 'users',
            'page_name'        => 'users_list',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

        return redirect()->back()->with($data);
    }

    private function syncPermissions(Request $request, $user): void
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
    }
}
