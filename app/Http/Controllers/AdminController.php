<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Admin;
use App\Imports\AdminsImport;
use Auth;

class AdminController extends Controller
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
        $admins = Admin::all();
        if($request->wantsJson()){
            return $admins;

        }else{
            return view('admins.admin', compact('admins'));
        }
    }

    public function create(){
        $users = \App\User::all();
        $sections = \App\Section::all();
        return view('admins.create',compact('users','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Admin::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Admin successfully created."
            ], 201);
        }else{
            $info = "Admin successfully created";
            $admins = Admin::all();
            return view('admins.admin',compact('info','admins'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Admin $admin)
    {
        if($request->wantsJson()){
            return $admin;
        }else{
            return view('admins.view', compact('admin'));
        }
    }

    public function edit(Admin $admin){
        $users = \App\User::all();
    $sections = \App\Section::all();
    return view('admins.edit',compact('users','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
            $admin->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Admin successfully updated.'], 200);
        }else{
            $info = "Admin successfully updated.";
            $admins = Admin::all();
            return view('admins.admin',compact('info','admins'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Admin $admin)
    {
            $admin->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Admin  deleted successfully.'], 200);
        }else{
            $info = "Admin  deleted successfully.";
            return view('admins.admin', compact('info'));
        }
    }

    public function getFile()
    {
        return view('admins.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new AdminsImport, request()->file('admin_file'));
        return redirect('admins.admin');
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
