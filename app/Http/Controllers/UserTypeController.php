<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserType;

class UserTypeController extends Controller
{
    /**
     * Return the currently login user
     * An instance of App\User model
     * @return App\User
     */
    protected function currentUser()
    {
        return Auth::guard('api')->user() ?? Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_types = UserType::all();
        if($request->wantsJson()){
            return $user_types;

        }else{
            return view('user_types.user_type', compact('user_types'));
        }
    }

    public function create(){
            return view('user_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            UserType::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"User_type successfully created."
            ], 201);
        }else{
            $info = "User_type successfully created";
            return view('user_types.create',compact('info'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType $user_type
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserType $user_type)
    {
        if($request->wantsJson()){
            return $user_type;
        }else{
            return view('user_types.view', compact('user_type'));
        }
    }

    public function edit(UserType $user_type){
        return view('user_types.edit',compact('user_type'));
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
            $user_type->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'User_type successfully updated.'], 200);
        }else{
            $info = "User_type successfully updated.";
            return view('user_types.edit', compact('info'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $user_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserType $user_type)
    {
            $user_type->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'User_type  deleted successfully.'], 200);
        }else{
            $info = "User_type  deleted successfully.";
            return view('user_types.user_type', compact('info'));
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
