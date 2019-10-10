<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

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
        $sections = \App\Section::all();
            return view('admins.create', compact('sections'));
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
            return view('admins.create',compact('info'));
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
        return view('admins.edit',compact('admin'));
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
            return view('admins.edit', compact('info'));
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
