@extends('layouts.app')

@section('title', 'People')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
          @include('includes.sidebar')
        </div>
        <div class="col-md-9">
          <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6">
                      <h5> All Meeting </h5>
                  </div>
                  <div class="col-lg-6">
                    <div class="text-right">
                      <button type="button" class="btn btn-outline-success btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#createMeetingModal">
                          <i class="fas fa-mail-bulk"></i> Create Meeting
                      </button>
                    </div>
                    <!-- add Requirement modal code start -->
                    <div class="modal fade" id="createMeetingModal" tabindex="-1" role="dialog">
                      @if(count($errors) > 0)
                          <script type="text/javascript">
                            $('#createMeetingModal').modal('show');
                          </script>
                      @endif
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"> Create Meeting </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true"> &times; </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  @include('meeting.create',['peoples' => $peoples, 'projects' => $projects])
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                    <button form="meeting" type="submit" class="btn btn-outline-success btn-sm"> <i class="fas fa-plus"></i> Save </button>
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
                        <th class="text-center"> Project Name </th>
                        <th class="text-center"> Date </th>
                        <th class="text-center"> Time </th>
                        <th class="text-center"> Duration </th>
                        <th class="text-center"> View </th>
                        <th class="text-center"> Edit </th>
                        <th class="text-center"> Delete </th>
                    </thead>
                    <tbody>
                        @foreach ($meetings as $meeting)
                        <tr>
                            <td class="text-center"> {{ $meeting->project_name }} </td>
                            <td class="text-center"> {{ $meeting->meeting_date }} </td>
                            <td class="text-center"> {{ $meeting->meeting_time }} </td>
                            <td class="text-center"> {{ $meeting->meeting_duration }} </td>
                            <td>
                                <div class="text-center">
                                  <a href="{{route('meeting.show', $meeting->id)}}" class="btn btn-outline-success btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#viewMeetingModal{{$meeting->id}}">
                                      <i class="fas fa-eye"></i>
                                  </a>
                                </div>
                                <!-- This below code edit madal Requirement -->
                                <div class="modal fade" id="viewMeetingModal{{$meeting->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Meeting Details </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true"> &times; </span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              @include('meeting.show')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End of the edit Requirement modal code -->
                            </td>
                            <td>
                                <div class="text-center">
                                  <a href="{{route('meeting.edit', $meeting->id)}}" class="btn btn-outline-info btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#editMeetingModal{{$meeting->id}}">
                                      <i class="fas fa-edit"></i>
                                  </a>
                                </div>
                                <!-- This below code edit madal meeting -->
                                <div class="modal fade" id="editMeetingModal{{$meeting->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Edit Meeting </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true"> &times; </span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              @include('meeting.edit')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                                <button form="editMeeting" type="submit" class="btn btn-outline-success btn-sm"> <i class="far fa-edit"></i> Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End of the edit meeting modal code -->
                            </td>
                            <td class="text-center">
                              <form action="{{ route('meeting.destroy',$meeting->id)}}" method="post">
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
