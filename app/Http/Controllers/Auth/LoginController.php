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
        //return json_decode($request);
        $this->validateLogin($request);
        if($this->attemptLogin($request)){
            $user = $this->guard()->user();
            $user->generateToken();
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
        }else{
            if($request->wantsJson()){
                return response()->json([
                    'info' => 'User validation failed.'
                ], 422);
            }else{
                $info = 'User validation failed.';
                return view('auth.login', compact('info'));
            }
        }
    }

    public function logout(Request $request){
        $user = Auth::guard('api')->user() ?? Auth::user();
        if($user){
            $user->api_token = null;
            $user->online = 0;
            $user->save();
            auth()->logout();
            if($request->wantsJson()){
                return response()->json([
                    "info" => "You have logged out."
                ], 200);
            }else{
                $info = "You have logged out.";
                return view('welcome', compact('info'));
            }
        }else{
            return response()->json([
                "info" => "There is an error. Try again later."
            ], 200);
        }
    }
}
