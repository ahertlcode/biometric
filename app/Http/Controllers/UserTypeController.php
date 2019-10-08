<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;

use Auth;

class UserTypeController extends Controller
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
            return UserType::where('status', 'on');
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
            UserType::create($request->all());
            return response()->json([
                "info"=>"User_type successfully created."
            ], 201);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType $user_type
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $user_type)
    {
        if($this->currentUser()){
            return $user_type;
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $user_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $user_type)
    {
        if($this->currentUser()){
            $user_type->update($request->all());
            return response()->json(['info' => 'User_type successfully updated.'], 200);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $user_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $user_type)
    {
        if($this->currentUser()){
            $user_type->delete();
            return response()->json(['info' => 'User_type  deleted successfully.'], 200);
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
