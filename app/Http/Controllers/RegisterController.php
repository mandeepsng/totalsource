<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
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

     public function register(StoreUserRequest $request)
     {
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

    public function process_login(Request $request)
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->except(['_token']);

            $user = User::where('email',$request->email)->first();

            if (auth()->attempt($credentials)) {

                return response()->json(['success' => 'Login Success !']);

            }else{

                return response()->json(['message' => 'Invalid credentials']);
            }
        }

}
