<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
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
}
