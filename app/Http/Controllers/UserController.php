<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Imports\UsersImport;
use Auth;

class UserController extends Controller
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
        /**
         * $users = array();
         * foreach(User::all() as $user){
         * $user['user_type'] = $user->user_type()[0]->user_type;
         *  $users[] = $user;
         * }
         */
        $users = array();
        foreach(User::all() as $user){
            $user['user_type'] = $user->user_type()["user_type"];
            $users[] = $user;
        }
        if($request->wantsJson()){
            return $users;

        }else{
            return view('users.user', compact('users'));
        }
    }

    public function create(){
        $user_types = \App\UserType::all();
        return view('users.create',compact('user_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            User::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"User successfully created."
            ], 201);
        }else{
            $info = "User successfully created";
            $users = User::all();
            return view('users.user',compact('info','users'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $attendance = array();

        $user_type = \App\UserType::where('id',
            $user->user_type_id
        )->first()->user_type;

        $model = "\App\\".ucwords($user_type);
        $extra = $model::where('user_id', $user->id)->get();

        if($user_type == "student"){
            $attendance = \App\Register::where('user_id', $user->id)
            ->groupBy('course_id')
            ->selectRaw('count(*) as total, course_id')
            ->get();
        }

        if(!empty($extra)){
            $user['details'] = $extra;
        }

        if(!empty($attendance)){
            $attnds = array();
            foreach($attendance as $attend)
            {
                $attend['course'] = $attend->course();
                $attnds[] = $attend;
            }
            $user['attendance'] = $attnds;
        }

        if($request->wantsJson()){
            return $user;
        }else{
            return view('users.view', compact('user'));
        }
    }

    public function edit(User $user){
        $user_types = \App\UserType::all();
        return view('users.edit',compact('user_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            $user->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'User successfully updated.'], 200);
        }else{
            $info = "User successfully updated.";
            $users = User::all();
            return view('users.user',compact('info','users'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
            $user->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'User  deleted successfully.'], 200);
        }else{
            $info = "User  deleted successfully.";
            return view('users.user', compact('info'));
        }
    }

    public function getFile()
    {
        return view('users.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new UsersImport, request()->file('user_file'));
        return redirect('users.user');
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
