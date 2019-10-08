<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use Auth;

class StudentController extends Controller
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
            return Student::where('status', 'on');
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
            Student::create($request->all());
            return response()->json([
                "info"=>"Student successfully created."
            ], 201);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        if($this->currentUser()){
            return $student;
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        if($this->currentUser()){
            $student->update($request->all());
            return response()->json(['info' => 'Student successfully updated.'], 200);
        }else{
            return response()->json(["info"=>"You must be logged in."], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($this->currentUser()){
            $student->delete();
            return response()->json(['info' => 'Student  deleted successfully.'], 200);
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
