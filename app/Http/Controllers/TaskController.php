<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class TaskController extends Controller
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
    public function index(Request $request)
    {
        $tasks = Task::all();
        return view('task.advancement',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'task_name' => 'required',
          'project_id' => 'required',
          'task_priority' => 'required',
          'task_progress' => 'required',
          'task_deadline' => 'required',
          'people_names' => 'required',
      ]);

        $task = new Task();

        $task->task_name        = $request->task_name;
        $task->project_id       = $request->project_id;
        $task->task_priority      = $request->task_priority;
        $task->task_progress      = $request->task_progress;
        $task->task_deadline = $request->task_deadline;
        $task->people_names    = $request->people_names;

        $task->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $task = Task::findOrFail($id);
      return view('task.edit',['task' => $task]);
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
        'task_name' => 'required',
        'project_id' => 'required',
        'task_priority' => 'required',
        'task_progress' => 'required',
        'task_deadline' => 'required',
        'people_names' => 'required',
      ]);

        $task = Task::findOrFail($id);
        //$project = Project::findOrFail($id);

        $task->project_id     = $request->project_id;
        $task->task_name      = $request->task_name;
        $task->task_priority  = $request->task_priority;
        $task->task_progress  = $request->task_progress;
        $task->task_deadline  = $request->task_deadline;
        $task->people_names   = $request->people_names;

        $task->save();

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
      $task = Task::findOrFail($id);
      $task->delete();
      return back();
    }
}
