<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Department;
use App\Imports\DepartmentsImport;
use Auth;

class DepartmentController extends Controller
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
        $departments = Department::all();
        if($request->wantsJson()){
            return $departments;

        }else{
            return view('departments.department', compact('departments'));
        }
    }

    public function create(){
        $faculties = \App\Faculty::all();
        return view('departments.create',compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Department::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Department successfully created."
            ], 201);
        }else{
            $info = "Department successfully created";
            $departments = Department::all();
            return view('departments.department',compact('info','departments'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Department $department)
    {
        if($request->wantsJson()){
            return $department;
        }else{
            return view('departments.view', compact('department'));
        }
    }

    public function edit(Department $department){
        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
            $department->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Department successfully updated.'], 200);
        }else{
            $info = "Department successfully updated.";
            $departments = Department::all();
            return view('departments.department',compact('info','departments'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Department $department)
    {
            $department->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Department  deleted successfully.'], 200);
        }else{
            $info = "Department  deleted successfully.";
            return view('departments.department', compact('info'));
        }
    }

    public function getFile()
    {
        return view('departments.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new DepartmentsImport, request()->file('department_file'));
        return redirect('departments.department');
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
