<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Requirement;
use App\People;
use App\Task;
use Session;

class ProjectController extends Controller
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
        $projects = Project::all();
        return view('home',['name' => 'Nesaar Ahmedd']);
        //return view('home',[ 'projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
          'project_name' => 'required|unique:projects',
          'project_deadline' => 'required',
          'customer_name' => 'required',
          'customer_phone' => 'required|unique:projects',
          'customer_email' => 'required|unique:projects',
          'project_description' => 'required|min:20',
      ]);

      $project = new Project();

        $project->project_name        = $request->project_name;
        $project->project_deadline    = $request->project_deadline;
        $project->customer_name       = $request->customer_name;
        $project->customer_phone      = $request->customer_phone;
        $project->customer_email      = $request->customer_email;
        $project->project_description = $request->project_description;

        $project->save();

        Session::flash( 'success', 'Project has been successfully created.' );
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail( $id );
        $requirements = Requirement::where('project_id', $project->id)->get();
        $tasks = Task::where('project_id', $project->id)->get();
        $peoples = People::all();
        //$requirement = Requirement::findOrFail($requirementId);
        return view('project.show', [ 'project' => $project, 'requirements' => $requirements, 'peoples'=> $peoples, 'tasks' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
