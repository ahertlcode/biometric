<?php

namespace App\Http\Controllers;

use App\PasswordReset;
use Illuminate\Http\Request;

use Auth;

class PasswordResetController extends Controller
{
    /**
     * Return the currently login user
     * An instance of App\User model
     * @return App\User
     */
    protected function currentUser()
    {
        return Auth::guard('api')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->currentUser()){
            return PasswordReset::where('status', 'on');
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->currentUser()){
            PasswordReset::create($request->all());
            return response()->json([
                "info"=>"Password_reset successfully created."
            ], 201);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PasswordReset $password_reset
     * @return \Illuminate\Http\Response
     */
    public function show(PasswordReset $password_reset)
    {
        if($this->currentUser()){
            return $password_reset;
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasswordReset $password_reset)
    {
        if($this->currentUser()){
            $password_reset->update($request->all());
            return response()->json(['info' => 'Password_reset successfully updated.'], 200);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasswordReset $password_reset)
    {
        if($this->currentUser()){
            $password_reset->delete();
            return response()->json(['info' => 'Password_reset  deleted successfully.'], 200);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }



    /**
     *
     * Add Business Logic function below here.
     *
     * Do not delete anything above.
     * Neither should you add anything above.
     * In other to keep every neat and functional.
     *
     * Happy coding...
     *
     */

}
