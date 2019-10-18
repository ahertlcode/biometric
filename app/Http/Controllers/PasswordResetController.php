<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\PasswordReset;
use App\Imports\PasswordResetsImport;
use Auth;

class PasswordResetController extends Controller
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
        $password_resets = PasswordReset::all();
        if($request->wantsJson()){
            return $password_resets;

        }else{
            return view('password_resets.password_reset', compact('password_resets'));
        }
    }

    public function create(){
        $emails = \App\Email::all();
        return view('password_resets.create',compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            PasswordReset::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Password_reset successfully created."
            ], 201);
        }else{
            $info = "Password_reset successfully created";
            $password_resets = PasswordReset::all();
            return view('password_resets.password_reset',compact('info','password_resets'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PasswordReset $password_reset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PasswordReset $password_reset)
    {
        if($request->wantsJson()){
            return $password_reset;
        }else{
            return view('password_resets.view', compact('password_reset'));
        }
    }

    public function edit(PasswordReset $password_reset){
        $emails = \App\Email::all();
    return view('password_resets.edit',compact('emails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasswordReset $password_reset)
    {
            $password_reset->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Password_reset successfully updated.'], 200);
        }else{
            $info = "Password_reset successfully updated.";
            $password_resets = PasswordReset::all();
            return view('password_resets.password_reset',compact('info','password_resets'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PasswordReset $password_reset)
    {
            $password_reset->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Password_reset  deleted successfully.'], 200);
        }else{
            $info = "Password_reset  deleted successfully.";
            return view('password_resets.password_reset', compact('info'));
        }
    }

    public function getFile()
    {
        return view('password_resets.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new Password_resetsImport, request()->file('password_reset_file'));
        return redirect('password_resets.password_reset');
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
