<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        if($request->wantsJson()) return $users;
        return view('users.user', compact('users'));
    }

    public function show(Request $request, User $user){
        if($request->wantsJson()){
            return $user;
        }else{
            return view('users/view', compact('user'));
        }
    }

}