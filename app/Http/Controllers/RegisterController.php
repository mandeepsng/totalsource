<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Requests\StoreUserRequest;
use App\Notifications\EmailVerification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Agency;
use App\Models\Freelancer;
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
use App\Http\Controllers\JobsController;
use Illuminate\Auth\Events\Registered;
use Tymon\JWTAuth\Facades\JWTAuth;

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

        if(request('role') == 2){
            $company = new Company;
            $company->about = "";
            $company->contact = "";
            $company->user_account_id = $user->id;
            $company->location = "UK";
            $company->website = "";
            $company->company_name = "";
            $user->company()->save($company);
        }

         if(request('role') == 4 ){
             $agency = new Agency;
             $agency->contact = "";
             $agency->user_account_id = $user->id;
             $agency->location = request('location');
             $user->agency()->save($agency);
         }
         if(request('role') == 3 ){
             $agency = new Freelancer();
             $agency->contact = "";
             $agency->user_account_id = $user->id;
             $agency->location = request('location');
             $user->agency()->save($agency);
         }

         if($user){
             event(new Registered($user));
//             $newobj = new JobsController;
//             $send_email = $newobj->sendEmail($user);
             //send email verify to user email
             //email details
             //create token
//             $token = JWTAuth::fromUser($user);
//
//             //create a new activation code
//             $activationCode = $this->generateVerificationCode();
//
//             //create a new token
//             $newToken = new Token;
//             $newToken->code = $activationCode;
//             $newToken->status = 0;
//             $newToken->user_id = $user->id;
//             $newToken->save();
//
//             //email details
//             $details = [
//                 'greeting' => 'Hi'.$request->name,
//                 'body' => 'use this activation code for verify your email address',
//                 'activation_code'=>$newToken->code,
//                 'thanks' => 'thank you',
//                 'order_id' => 101
//             ];
//             Notification::send($user, new EmailVerification($details));
             $token = $user->createToken('authtoken')->plainTextToken;

             return response()->json([ 'success' => 'User created Successfully !', 'token' => $token, 'user' => $user ]);
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

                $token = $user->createToken('authtoken');
//                $token = $user->createToken('authtoken')->plainTextToken;

                return response()->json(['success' => 'Login Success !', 'auth' => 'done', 'user' => $user, 'token' => $token->plainTextToken ]);

            }else{

                return response()->json(['message' => 'Invalid credentials', 'auth' =>'fail' ]);
            }
        }


        public function logout(Request $request){
            \auth()->user()->tokens()->delete();

            return [
                'message' => 'Logged Out'
            ];
        }

        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->except(['_token']);

            $user = User::where('email',$request->email)->first();

            if (auth()->attempt($credentials)) {

                $user = Auth::user();

                $token = $user->createToken('sdkfjds54dfsdf')->plainTextToken;

                $cookie = cookie('jwt', $token, 60*24); // 1 day

                return response([
                    'success' => 'Login Success !',
                    'auth' => 'done',
                    'user' => $user,
                    'token' => $token
                ])->withCookie($cookie);

            }else{

                return response()->json(['message' => 'Invalid credentials', 'auth' =>'fail' ]);
            }
        }

}
