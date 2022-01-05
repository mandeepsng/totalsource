<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class RegisterController extends Controller
{
    //
//    public function __invoke()
//    {
//        request()->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'confirmed'],
//        ]);
//        $user = User::create([
//            'name' => \request('name'),
//            'email' => \request('email'),
//            'password' => Hash::make(request('password')),
//        ]);
//        Auth::guard('web')->login($user);
//    }

     public function register(Request $request)
     {

         $all = $request->all();
         $validate =  request()->validate([
             'first_name' => ['required', 'string', 'max:255'],
             'last_name' => ['required', 'string', 'max:255'],
             'role' => ['required'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'confirmed'],
         ]);

         $user = User::create([
             'first_name' => request('first_name'),
             'last_name' => request('last_name'),
             'email' => request('email'),
             'role' => request('role'),
             'password' => Hash::make(request('password')),
         ]);

         if($user){
             return response()->json(['success' => 'User created Successfully !']);
         }
     }

}
