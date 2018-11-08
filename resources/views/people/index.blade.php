@extends('layouts.app')

@section('title', 'People')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
          @include('includes.sidebar')
        </div>
        <div class="col-md-9">
          @if(Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
              <span> {{ Session::get('success') }} </span>
            </div>
          @endif
          <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6">
                      <h5> List of People </h5>
                  </div>
                  <div class="col-lg-6">
                    <div class="text-right">
                      <button type="button" class="btn btn-outline-success btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#addPeopleModal">
                          <i class="fas fa-user-plus"></i> Add People
                      </button>
                    </div>
                    <!-- add Requirement modal code start -->
                    <div class="modal fade" id="addPeopleModal" tabindex="-1" role="dialog">
                      @if(count($errors) > 0)
                          <script type="text/javascript">
                            $('#addPeopleModal').modal('show');
                          </script>
                      @endif
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"> Add People </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true"> &times; </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  @include('people.create')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                    <button form="people" type="submit" class="btn btn-outline-success btn-sm"> <i class="fas fa-plus"></i> Save </button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- add Requirement modal code end -->
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <th class="text-center"> Name </th>
                        <th class="text-center"> Profession </th>
                        <th class="text-center"> E-mail </th>
                        <th class="text-center"> Edit </th>
                        <th class="text-center"> Delete </th>
                    </thead>
                    <tbody>
                        @foreach ($peoples as $people)
                        <tr>
                            <td class="text-center"> {{ $people->name }} </td>
                            <td class="text-center"> {{ $people->profession }} </td>
                            <td class="text-center"> {{ $people->email }} </td>
                            <td>
                                <div class="text-center">
                                  <a href="{{route('people.edit', $people->id)}}" class="btn btn-outline-info btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#editPeopleModal{{$people->id}}">
                                      <i class="fas fa-edit"></i>
                                  </a>
                                </div>
                                <!-- This below code edit madal Requirement -->
                                <div class="modal fade" id="editPeopleModal{{$people->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Edit People </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true"> &times; </span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              @include('people.edit')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                                <button form="editpeople" type="submit" class="btn btn-outline-success btn-sm"> <i class="far fa-edit"></i> Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End of the edit Requirement modal code -->
                            </td>
                            <td class="text-center">
                              <form action="{{ route('people.destroy',$people->id)}}" method="post">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-outline-danger btn-sm"> <i class="far fa-trash-alt"></i> </button>
                              </form>
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
@endsection
