<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Information::paginate(10);
        return view('data')->with(compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inputInstitutionName' => 'required|unique:information,name',
            'inputLocation' => 'required',
            'inputTotalStudents' => 'required',
            'inputTotalTeachers' => 'required'
        ]);
        $data = new Information();
        $data->name = $request->inputInstitutionName;
        $data->inputInstitutionType = $request->inputInstitutionType;
        $data->location = $request->inputLocation;
        $data->total_student = $request->inputTotalStudents;
        $data->total_teacher = $request->inputTotalTeachers;
        $data->save();

        Session::flash('success', 'Add successful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('edit')->with(compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $this->validate($request, [
            'inputInstitutionName' => "required|unique:information,name,$information->id",
            'inputLocation' => 'required',
            'inputTotalStudents' => 'required',
            'inputTotalTeachers' => 'required'
        ]);
        $information->name = $request->inputInstitutionName;
        $information->inputInstitutionType = $request->inputInstitutionType;
        $information->location = $request->inputLocation;
        $information->total_student = $request->inputTotalStudents;
        $information->total_teacher = $request->inputTotalTeachers;
        $information->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        if (!is_null($information)) {
            $information->delete();
        }
        return redirect()->back();
    }

    public function trash()
    {
        $all_data = Information::onlyTrashed()->get();
        return view('trash')->with(compact('all_data'));
    }
    public function restore($id)
    {
        $data = Information::withTrashed()->find($id);
        if(!is_null($data)){
            $data->restore();
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $data = Information::withTrashed()->find($id);
        if(!is_null($data)){
            $data->forceDelete();
        }
        return redirect()->back();
    }
}
