<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lecturer;

class LecturerController extends Controller
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
        $lecturers = Lecturer::all();
        if($request->wantsJson()){
            return $lecturers;

        }else{
            return view('lecturers.lecturer', compact('lecturers'));
        }
    }

    public function create(){
            return view('lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Lecturer::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Lecturer successfully created."
            ], 201);
        }else{
            $info = "Lecturer successfully created";
            return view('lecturers.create',compact('info'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lecturer $lecturer)
    {
        if($request->wantsJson()){
            return $lecturer;
        }else{
            return view('lecturers.view', compact('lecturer'));
        }
    }

    public function edit(Lecturer $lecturer){
        return view('lecturers.edit',compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
            $lecturer->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Lecturer successfully updated.'], 200);
        }else{
            $info = "Lecturer successfully updated.";
            return view('lecturers.edit', compact('info'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Lecturer $lecturer)
    {
            $lecturer->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Lecturer  deleted successfully.'], 200);
        }else{
            $info = "Lecturer  deleted successfully.";
            return view('lecturers.lecturer', compact('info'));
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
