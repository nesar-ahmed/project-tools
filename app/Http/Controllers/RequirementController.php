<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use App\Project;

class RequirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
          'req_name' => 'required',
          'req_priority' => 'required',
          'req_estimate' => 'required',
          'req_deadline' => 'required',
          'req_description' => 'required',
      ]);

        $requirement = new Requirement();
        //$project = Project::findOrFail($id);

        $requirement->project_id = $request->project_id;
        $requirement->req_name        = $request->req_name;
        $requirement->req_priority    = $request->req_priority;
        $requirement->req_estimate       = $request->req_estimate;
        $requirement->req_deadline      = $request->req_deadline;
        $requirement->req_description      = $request->req_description;

        $requirement->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $requirement = Requirement::findOrFail($id);
      return view('requirement.show',['requirement' => $requirement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requirement = Requirement::findOrFail($id);
        return view('requirement.edit',['requirement' => $requirement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'req_name' => 'required',
          'req_priority' => 'required',
          'req_estimate' => 'required',
          'req_deadline' => 'required',
          'req_description' => 'required',
      ]);

        $requirement = Requirement::findOrFail($id);
        //$project = Project::findOrFail($id);

        $requirement->project_id = $request->project_id;
        $requirement->req_name        = $request->req_name;
        $requirement->req_priority    = $request->req_priority;
        $requirement->req_estimate       = $request->req_estimate;
        $requirement->req_deadline      = $request->req_deadline;
        $requirement->req_description      = $request->req_description;

        $requirement->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $requirement = Requirement::findOrFail($id);
      $requirement->delete();
      return back();
    }
}
