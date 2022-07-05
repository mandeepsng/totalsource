<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function all_users()
    {
        $users =  User::all();
            return $users;
    }

    public function update_google_data(Request $request)
    {

        $user = User::find($request->id);
        $user->google_email = $request->google_email;
        $user->google_uid = $request->google_uid;
        $save = $user->save();
        if($save){
            return response()->json(['status' => 200 , 'success' => 'Google signup success with '.$user->google_email ]);
        }
        return response()->json(['status' => 400 ]);
    }



}
