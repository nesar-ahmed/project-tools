@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-3">
            @include('includes.sidebar')
          </div>
          <div class="col-md-9">
            @foreach ($projects as $project)
              {{ $project->project_names}}
            @endforeach
          </div>
      </div>
  </div>
@endsection
