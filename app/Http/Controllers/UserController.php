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

}
