<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;

class CourseController extends Controller
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
        $courses = Course::all();
        if($request->wantsJson()){
            return $courses;

        }else{
            return view('courses.course', compact('courses'));
        }
    }

    public function create(){
            return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Course::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Course successfully created."
            ], 201);
        }else{
            $info = "Course successfully created";
            return view('courses.create',compact('info'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        if($request->wantsJson()){
            return $course;
        }else{
            return view('courses.view', compact('course'));
        }
    }

    public function edit(Course $course){
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
            $course->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Course successfully updated.'], 200);
        }else{
            $info = "Course successfully updated.";
            return view('courses.edit', compact('info'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
            $course->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Course  deleted successfully.'], 200);
        }else{
            $info = "Course  deleted successfully.";
            return view('courses.course', compact('info'));
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
