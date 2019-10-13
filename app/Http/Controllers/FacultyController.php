<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Faculty;
use App\Imports\FacultiesImport;
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
        return Auth::guard('api')->user() ?? Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faculties = Faculty::all();
        if($request->wantsJson()){
            return $faculties;

        }else{
            return view('faculties.faculty', compact('faculties'));
        }
    }

    public function create(){
            return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Faculty::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Faculty successfully created."
            ], 201);
        }else{
            $info = "Faculty successfully created";
            $faculties = Faculty::all();
            return view('faculties.faculty',compact('info','faculties'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Faculty $faculty)
    {
        if($request->wantsJson()){
            return $faculty;
        }else{
            return view('faculties.view', compact('faculty'));
        }
    }

    public function edit(Faculty $faculty){
        return view('faculties.edit',compact('faculty'));
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
            $faculty->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Faculty successfully updated.'], 200);
        }else{
            $info = "Faculty successfully updated.";
            $faculties = Faculty::all();
            return view('faculties.faculty',compact('info','faculties'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faculty $faculty)
    {
            $faculty->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Faculty  deleted successfully.'], 200);
        }else{
            $info = "Faculty  deleted successfully.";
            return view('faculties.faculty', compact('info'));
        }
    }

    public function getFile()
    {
        return view('faculties.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new FacultiesImport, request()->file('faculty_file'));
        return redirect('faculties.faculty');
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
