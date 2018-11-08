<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\People;
use App\Project;

class MeetingController extends Controller
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
        $meetings = Meeting::all();
        $projects = Project::all();
        $peoples = People::all();
        return view('meeting.index',['meetings' => $meetings, 'projects' => $projects, 'peoples' => $peoples]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meeting.create');
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
          'project_name' => 'required',
          'people_names' => 'required',
          'meeting_date' => 'required',
          'meeting_time' => 'required',
          'meeting_duration' => 'required',
          'meeting_description' => 'required',
      ]);

        $meeting = new Meeting();

        $peoplenames = $request->input('people_names');
        $peoplenames = implode(',', $peoplenames);

        // $input = $request->except('people_names');
        // //Assign the "mutated" news value to $input
        // $input['people_names'] = $peoplenames;

        $meeting->project_name        = $request->project_name;
        $meeting->people_names    = $peoplenames;
        $meeting->meeting_date       = $request->meeting_date;
        $meeting->meeting_time      = $request->meeting_time;
        $meeting->meeting_duration      = $request->meeting_duration;
        $meeting->meeting_description = $request->meeting_description;

        $meeting->save();

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
        $meeting = Meeting::findOrFail($id);
        return view('meeting.show',['meeting' => $meeting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);
        // $projects = Project::all();
        // $peoples = People::all();
        return view('meeting.edit',['meeting'=> $meeting]);
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

        $meeting = Meeting::findOrFail($id);

        $peoplenames = $request->input('people_names');
        $peoplenames = implode(',', $peoplenames);

        // $input = $request->except('people_names');
        // //Assign the "mutated" news value to $input
        // $input['people_names'] = $peoplenames;

        $meeting->project_name        = $request->project_name;
        $meeting->people_names    = $peoplenames;
        $meeting->meeting_date       = $request->meeting_date;
        $meeting->meeting_time      = $request->meeting_time;
        $meeting->meeting_duration      = $request->meeting_duration;
        $meeting->meeting_description = $request->meeting_description;

        $meeting->save();

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
      $meeting = Meeting::findOrFail($id);
      $meeting->delete();
      return back();
    }
}
