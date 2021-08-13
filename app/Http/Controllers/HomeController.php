<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $data = [
            'category_name'    => 'dashboard',
            'page_name'        => 'dashboard',
            'has_scrollspy'    => 0,
            'scrollspy_offset' => '',
            'alt_menu'         => 0,
        ];

//        flash('You are now a Laracasts member!','gradient');

        return view('dashboard')->with($data);
    }
}
