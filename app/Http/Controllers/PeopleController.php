<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use Session;

class PeopleController extends Controller
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
        $peoples = People::all();
        return view('people.index',[ 'peoples' => $peoples]);
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
          'name' => 'required',
          'profession' => 'required',
          'email' => 'required|unique:people',
      ]);

        $people = new People();
        //$project = Project::findOrFail($id);

        $people->name = $request->name;
        $people->profession        = $request->profession;
        $people->email    = $request->email;

        $people->save();
        Session::flash( 'success', 'People has been successfully added.' );
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
      $people = People::findOrFail($id);
      return view('people.edit',['people' => $people]);
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
          'name' => 'required',
          'profession' => 'required',
          'email' => 'required',
      ]);

        $people = People::findOrFail($id);
        //$project = Project::findOrFail($id);

        $people->name = $request->name;
        $people->profession        = $request->profession;
        $people->email    = $request->email;

        $people->save();

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
      $people = People::findOrFail($id);
      $people->delete();
      return back();
    }
}
