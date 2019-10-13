<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Student;
use App\Imports\StudentsImport;
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
        return Auth::guard('api')->user() ?? Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::all();
        if($request->wantsJson()){
            return $students;

        }else{
            return view('students.student', compact('students'));
        }
    }

    public function create(){
        $users = \App\User::all();
    $levels = \App\Level::all();
    $departments = \App\Department::all();
        return view('students.create',compact('users','levels','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Student::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Student successfully created."
            ], 201);
        }else{
            $info = "Student successfully created";
            $students = Student::all();
            return view('students.student',compact('info','students'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Student $student)
    {
        if($request->wantsJson()){
            return $student;
        }else{
            return view('students.view', compact('student'));
        }
    }

    public function edit(Student $student){
        return view('students.edit',compact('student'));
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
            $student->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Student successfully updated.'], 200);
        }else{
            $info = "Student successfully updated.";
            $students = Student::all();
            return view('students.student',compact('info','students'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {
            $student->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Student  deleted successfully.'], 200);
        }else{
            $info = "Student  deleted successfully.";
            return view('students.student', compact('info'));
        }
    }

    public function getFile()
    {
        return view('students.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new StudentsImport, request()->file('student_file'));
        return redirect('students.student');
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
