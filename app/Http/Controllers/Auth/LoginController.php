<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'phone';
    }

    public function login(Request $request){
        $this->validateLogin($request);
        if($this->attemptLogin($request)){
            $user = $this->guard()->user();
            $user->generateToken();
            if($user->email_validated_at !== null && $user->status == '1'){
                ($user) ? $user->online = 1 : '';
                $user->save();
                if($request->wantsJson()){
                    return response()->json([
                        'info' => "Login successful.",
                        'data' => $user
                    ], 200);
                }else{
                    $info = "Login Successful.";
                    $data = $user;
                    return view('/home', compact('info','data'));
                }

            }else if($user->email_validated_at == null){
                $user->rememberToken();
                Mail::to($user->email)->send(new ConfirmationEmail($user));
                if($request->wantsJson()){
                    return response()->json([
                        'info' => "You must verify your e-mail before log in,\ncheck you e-mail for a verification code.\nJust sent to you again now."
                    ], 200);
                }else{
                    $info = "You must verify your e-mail before log in,\ncheck you e-mail for a verification code.\nJust sent to you again now.";
                    return view('/verify', compact('info'));
                }
            }else{
                if($request->wantsJson()){
                    return response()->json([
                        'info' => "There is a problem, you need to contact support. Thank you."
                    ], 200);
                }else{
                    $info = "There is a problem, you need to contact support. Thank you.";
                    return view('/verify', compact('info'));
                }
            }

        }
    }

    public function logout(Request $request){
        $user = Auth::guard('api')->user();
        if($user){
            $user->api_token = null;
            $user->online = 0;
            $user->save();
            return response()->json([
                "info" => "You have logged out."
            ], 200);
        }else{
            return response()->json([
                "info" => "There is an error. Try again later."
            ], 200);
        }
    }
}
