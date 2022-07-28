<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
//use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Contracts\Hashing\Hasher;

class ForgotPasswordController extends Controller
{

    protected function sendResetLinkResponse(Request $request)
    {
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $response =  Password::sendResetLink($input);
        if($response == Password::RESET_LINK_SENT){
            $message = "Mail send successfully";
            $status = 200;
        }else{
            $message = "Email could not be sent to this email address";
            $status = 422;
        }
            //$message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : GLOBAL_SOMETHING_WANTS_TO_WRONG;
        $response = ['status'=>$status,'message' => $message ];
        return response($response, 200);
    }

    public function check_reset_token(Request $request)
    {
//        return response()->json(['message' => $request->token ]);
        $token = DB::table('password_resets')
            ->where('email','=',$request->email)
            ->where('created_at','>',Carbon::now()->subHours(2))
            ->first();

        if(empty($token) || $token === null ){
            return response()->json(['message' => 'Link Expried' , 'status' => 422 ]);
        }
        return response()->json(['message' => 'working', 'status' => 200 ]);
    }


    public function checkToken(Request $request)
    {


        $password_resets = DB::table('password_resets')->where('email', $request->email)->first();

        $v = Hash::check($request->token, $password_resets->token);
        if ($password_resets &&  Hash::check($request->token, $password_resets->token)) {
            $createdAt = Carbon::parse($password_resets->created_at);
//            if (!Carbon::now()->greaterThan($createdAt->addMinutes(config('auth.passwords.users.expire')))) {
//                return \response()->json()->setStatusCode(200);
//            }
        }

        return \response()->json()->setStatusCode(419);
    }

}
