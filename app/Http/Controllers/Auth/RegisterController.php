<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            return User::create([
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'user_type_id' => $data['user_type_id'],
            ]);
    }

    protected function registered(Request $request, User $user)
    {
        $user->rememberToken();
        Mail::to($user->email)->send(new ConfirmationEmail($user));
        if($request->wantsJson()){
            return response()->json([
                "info" => "E-mail verification code sent to $user->email",
            ], 201);
        }else{
            return view('auth.register')->with('info', "E-mail verification code sent to $user->email");
        }
    }

    public function verifymail(Request $request){
        $user = User::where('email', $request->email)
                ->where('remember_token', $request->verification_code)
                ->first();
        if($user){
            $user->email_verified_at = now();
            $user->status = '1';
            $user->save();
            return response()->json([
                'info' => "Email validation successful."
            ], 200);
        }else{
            return response()->json([
                'info' => "There is an error, try again later."
            ], 200);
        }
    }
}
