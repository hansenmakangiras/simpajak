<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Traits\Authorizable;
use Auth;
use Illuminate\Validation\ValidationException;
use Request;

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

        return view('pages.users.list_pengguna',compact('users'))->with($data);
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

        return view('pages.users.create',compact('users','roles'))->with($data);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {
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

        return redirect()->route('users.index')->with($data);
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

        $users = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('pages.users.edit',compact('users','roles','permissions'))->with($data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
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

        return view('pages.users.show')->with($data);
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

        return view('pages.users.user_profile')->with($data);
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

        return view('pages.users.user_account_setting',compact('users'))->with($data);
    }

    public function destroy($id)
    {
        if ( Auth::user()->id === $id ) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }

        if( User::findOrFail($id)->delete() ) {
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
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
    }
}
