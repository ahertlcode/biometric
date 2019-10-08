<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

use Auth;

class FacultyController extends Controller
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
            return Faculty::where('status', 'on');
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
            Faculty::create($request->all());
            return response()->json([
                "info"=>"Faculty successfully created."
            ], 201);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        if($this->currentUser()){
            return $faculty;
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        if($this->currentUser()){
            $faculty->update($request->all());
            return response()->json(['info' => 'Faculty successfully updated.'], 200);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        if($this->currentUser()){
            $faculty->delete();
            return response()->json(['info' => 'Faculty  deleted successfully.'], 200);
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
