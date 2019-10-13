<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Level;
use App\Imports\LevelsImport;
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
        return Auth::guard('api')->user() ?? Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $levels = Level::all();
        if($request->wantsJson()){
            return $levels;

        }else{
            return view('levels.level', compact('levels'));
        }
    }

    public function create(){
            return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Level::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Level successfully created."
            ], 201);
        }else{
            $info = "Level successfully created";
            $levels = Level::all();
            return view('levels.level',compact('info','levels'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level $level
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Level $level)
    {
        if($request->wantsJson()){
            return $level;
        }else{
            return view('levels.view', compact('level'));
        }
    }

    public function edit(Level $level){
        return view('levels.edit',compact('level'));
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
            $level->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Level successfully updated.'], 200);
        }else{
            $info = "Level successfully updated.";
            $levels = Level::all();
            return view('levels.level',compact('info','levels'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Level $level)
    {
            $level->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Level  deleted successfully.'], 200);
        }else{
            $info = "Level  deleted successfully.";
            return view('levels.level', compact('info'));
        }
    }

    public function getFile()
    {
        return view('levels.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new LevelsImport, request()->file('level_file'));
        return redirect('levels.level');
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
