<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Section;
use App\Imports\SectionsImport;
use Auth;

class SectionController extends Controller
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
        $sections = Section::all();
        if($request->wantsJson()){
            return $sections;

        }else{
            return view('sections.section', compact('sections'));
        }
    }

    public function create(){
            return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Section::create($request->all());
            if($request->wantsJson()){
                return response()->json([
                "info"=>"Section successfully created."
            ], 201);
        }else{
            $info = "Section successfully created";
            $sections = Section::all();
            return view('sections.section',compact('info','sections'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section $section
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Section $section)
    {
        if($request->wantsJson()){
            return $section;
        }else{
            return view('sections.view', compact('section'));
        }
    }

    public function edit(Section $section){
        return view('sections.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
            $section->update($request->all());
            if($request->wantsJson()){
            return response()->json(['info' => 'Section successfully updated.'], 200);
        }else{
            $info = "Section successfully updated.";
            $sections = Section::all();
            return view('sections.section',compact('info','sections'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Section $section)
    {
            $section->delete();
            if($request->wantsJson()){
            return response()->json(['info' => 'Section  deleted successfully.'], 200);
        }else{
            $info = "Section  deleted successfully.";
            return view('sections.section', compact('info'));
        }
    }

    public function getFile()
    {
        return view('sections.upload');
    }

    public function upload(Request $request)
    {
        Excel::import(new SectionsImport, request()->file('section_file'));
        return redirect('sections.section');
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
