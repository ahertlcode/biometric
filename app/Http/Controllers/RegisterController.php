<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Register;
use App\Imports\RegistersImport;
use Auth;

class RegisterController extends Controller
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
        $registers = array();
        foreach(Register::all() as $register){
            $register['user'] = $register->user_id;//$register->user()["id"];
            $register['course'] = $register->course()["course"];
            $registers[] = $register;
        }
        if($request->wantsJson()){
            return $registers;

        }else{
            return view('registers.register', compact('registers'));
        }
    }

    public function create(){
        $users = \App\User::all();
        $courses = \App\Course::all();
        return view('registers.create',compact('users','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = \App\Student::where('matric_number', $request->matric_number)->get(['id']);
        $course_id = \App\Course::where('course', $request->course_code)->get(['id']);
        $request->request->add(['user_id' => $user_id]);
        $request->request->add(['course_id' => $course_id]);
        Register::create($request->all());
        if($request->wantsJson()){
            return response()->json([
            "info"=>"Register successfully created."
        ], 200);
        }else{
            $info = "Register successfully created";
            $registers = Register::all();
            return view('registers.register',compact('info','registers'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Register $register)
    {
        if($request->wantsJson()){
            return $register;
        }else{
            return view('registers.view', compact('register'));
        }
    }

    public function edit(Register $register){
        $users = \App\User::all();
        $courses = \App\Course::all();
        return view('registers.edit',compact('users','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
            $register->update($request->all());
            if($request->wantsJson()){
                return response()->json(['info' => 'Register successfully updated.'], 200);
            }else{
                $info = "Register successfully updated.";
                $registers = Register::all();
                return view('registers.register',compact('info','registers'));
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Register $register)
    {
            $register->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Register  deleted successfully.'], 200);
        }else{
            $info = "Register  deleted successfully.";
            return view('registers.register', compact('info'));
        }
    }

    public function getFile()
    {
        return view('registers.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new RegistersImport, request()->file('register_file'));
        return redirect('registers.register');
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
