@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-3">
            @include('includes.sidebar')
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                  <h4 class="text-info text-center"> Task Advancement </h4>
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <table class="table table-bordered table-hover table-sm text-center">
                                      <thead>
                                        <th> Project Name </th>
                                          <th> Task </th>
                                          <th> Name </th>
                                          <th> Deadline </th>
                                          <th> Status </th>
                                      </thead>
                                      <tbody>
                                          @foreach ($tasks as $task)
                                              <tr>
                                                  <td> {{ $task->project->project_name }}</td>
                                                  <td> {{ $task->task_name }} </td>
                                                  <td> {{ $task->people_names }} </td>
                                                  <td> {{ $task->task_deadline}} </td>
                                                  <td>
                                                      @if ($task->task_progress == 1)
                                                        Ongoing
                                                      @else
                                                        Done
                                                      @endif
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection
