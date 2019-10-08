<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Mail\EmailResetToken;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset token to the given user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request){
        $this->validate($request, ['email' => 'required|email']);
        $user = User::where('email', $request->input('email'))->first();
        if(!$user){
            return response()->json([
                'info' => "Email not found."
            ], 200);
        }
        $token = $this->broker()->createToken($user);
        Mail::to($user->email)->send(new EmailResetToken($user, $token));
        return response()->json([
            'info' => "Verification mail sent."
        ], 200);
    }
}
