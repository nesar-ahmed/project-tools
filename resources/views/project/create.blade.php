@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-3">
            @include('includes.sidebar')
          </div>
          <div class="col-md-9">
            <div class="card">
                  <div class="card-header"> Create Project </div>
                  <div class="card-body">

                      <form action="{{ route('project.store') }}" method="POST">
                        @csrf
                          <div class="form-group">
                              <div class="form-row">
                                  <div class="col-lg-6">
                                      <label for="projectName"> Project Name: </label>
                                      <input type="text" name="project_name" id="projectName" value="{{ old('project_name') }}" class="form-control{{ $errors->has('project_name') ? ' is-invalid' : '' }}">
                                      @if ($errors->has('project_name'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('project_name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="col-lg-6">
                                      <label for="projectDeadline"> Project Deadline: </label>
                                      <input type="date" name="project_deadline" id="projectDeadline" class="form-control{{ $errors->has('project_deadline') ? ' is-invalid' : '' }}">
                                      @if ($errors->has('project_deadline'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('project_deadline') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="form-row">
                                  <div class="col-lg-4">
                                      <label for="customerName"> Customer Name: </label>
                                      <input type="text" name="customer_name" id="customerName" class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}">
                                      @if ($errors->has('customer_name'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('customer_name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="col-lg-4">
                                      <label for="customerPhone"> Customer Phone: </label>
                                      <input type="text" name="customer_phone" id="customerPhone" value="{{ old('customer_phone') }}" class="form-control{{ $errors->has('customer_phone') ? ' is-invalid' : '' }}">
                                      @if ($errors->has('customer_phone'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('customer_phone') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="col-lg-4">
                                      <label for="customerEmail"> Customer E-mail: </label>
                                      <input type="email" name="customer_email" id="customerEmail" value="{{ old('customer_email') }}" class="form-control{{ $errors->has('customer_email') ? ' is-invalid' : '' }}" >
                                      @if ($errors->has('customer_email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('customer_email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="projectDescription"> Project Description: </label>
                              <textarea class="form-control{{ $errors->has('project_description') ? ' is-invalid' : '' }}" name="project_description" id="projectDescription" cols="30" rows="3" ></textarea>
                              @if ($errors->has('project_description'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('project_description') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group text-right">
                              <button type="submit" class="btn btn-outline-success"> <i class="fas fa-folder-plus"></i> Create Project </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
