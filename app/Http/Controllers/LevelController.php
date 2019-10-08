<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

use Auth;

class LevelController extends Controller
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
            return Level::where('status', 'on');
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
            Level::create($request->all());
            return response()->json([
                "info"=>"Level successfully created."
            ], 201);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        if($this->currentUser()){
            return $level;
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        if($this->currentUser()){
            $level->update($request->all());
            return response()->json(['info' => 'Level successfully updated.'], 200);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        if($this->currentUser()){
            $level->delete();
            return response()->json(['info' => 'Level  deleted successfully.'], 200);
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
