<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified',
            ];
        }


        $request->user()->sendEmailVerificationNotification();

        $token = $request->user()->createToken('resend')->plainTextToken;

        return ['status' => 'verification-link-sent', 'token' => $token];
    }

    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Email already verified'
            ];
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'message'=>'Email has been verified'
        ];
    }

    public function generate_sanctum_token(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('resend')->plainTextToken;

        return ['status' => $user, 'token' => $token];

    }

}
