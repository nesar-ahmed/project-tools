@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
          @include('includes.sidebar')
        </div>
        <div class="col-md-9">

          @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              <p class="text-center"> {{ Session::get('success') }} </p>
            </div>
          @endif
          <div class="row">
            @foreach ($projects as $project)
            <div class="col-md-6">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title"> {{ $project->project_name }} </h4>
                  <p class="card-text">
                    <p>  <b> Deadline: </b>  {{ $project->project_deadline }} </p>
                  </p>
                  <a href="{{ route('project.show', $project->id )}}" class="btn btn-outline-success btn-sm"> <i class="far fa-eye"></i> More Details </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
</div>
@endsection
