<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logged_in_user;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count=logged_in_user::query()->count();


        return view('home',compact('count'));
    }
}
