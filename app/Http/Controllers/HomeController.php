<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('login');
    }

    public function notallowed()
    {
//        return view('adminadmin.error-404');
        $user = Auth::user();

        if($user->role === 1){
            return redirect()->route('super.adminHome');
        }
        return view('home');
    }

    public function error()
    {
//        return view('adminadmin.error-404');
        return view('admin/error-404');
    }

    public function adminHome()
    {
        $user = Auth::user();
//        dd($user);
        return view('adminHome');
    }

    public function index_admin()
    {
        return view('index_admin');
    }



}
