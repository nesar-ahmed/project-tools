@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-3">
            @include('includes.sidebar')
          </div>
          <div class="col-lg-9">
              <div class="card">
                  <div class="card-body">
                      <h5 class="text-info text-center"> {{ $project->project_name }} </h5> <hr>
                      <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true"> Description </a>
                              <a class="nav-item nav-link" id="nav-backlog-tab" data-toggle="tab" href="#nav-backlog" role="tab" aria-controls="nav-backlog" aria-selected="false"> Product Backlog </a>
                              <a class="nav-item nav-link" id="nav-board-tab" data-toggle="tab" href="#nav-board" role="tab" aria-controls="nav-board" aria-selected="false"> Task Board </a>
                          </div>
                      </nav> &nbsp;
                      <div class="tab-content" id="nav-tabContent">
                          <!-- Description section code start  -->
                          <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                              <div class="row">
                                  <div class="col-lg-6">
                                      <p> <b> Customer Name: </b> {{ $project->customer_name }} </p>
                                  </div>
                                  <div class="col-lg-6">
                                      <p> <b> Customer Phone: </b> {{ $project->customer_phone }} </p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-6">
                                      <p> <b> Customer E-mail: </b> {{ $project->customer_email }} </p>
                                  </div>
                                  <div class="col-lg-6">
                                      <p> <b> Project Deadline: </b> {{ $project->project_deadline }} </p>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                   <p class="text-justify">
                                     <b> Description: </b> {{ $project->project_description }}
                                   </p>
                                 </div>
                               </div>
                          </div> <!-- Description section code end  -->

                          <!-- Backlog section code start  -->
                          <div class="tab-pane fade" id="nav-backlog" role="tabpanel" aria-labelledby="nav-backlog-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="text-muted"> Product Backlog: </h4>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-right">
                                        <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addRequirementModal">
                                            <i class="fas fa-plus"></i> Add Requirement
                                        </button>
                                    </p>
                                    <!-- add Requirement modal code start -->
                                    <div class="modal fade" id="addRequirementModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> Add Requirement </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true"> &times; </span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  @include('requirement.create',['project_id' => $project->id])
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                                    <button form="requirement" type="submit" class="btn btn-outline-success btn-sm"> <i class="fas fa-plus"></i> Save </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- add Requirement modal code end -->
                                </div>
                            </div>
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Priority </th>
                                    <th class="text-center"> Deadline </th>
                                    <th class="text-center"> View </th>
                                    <th class="text-center"> Edit </th>
                                    <th class="text-center"> Delete </th>
                                </thead>
                                <tbody>
                                    @foreach ($requirements as $requirement)
                                    <tr>
                                        <td class="text-center"> {{ $requirement->req_name }} </td>
                                        <td class="text-center"> {{ $requirement->req_priority }} </td>
                                        <td class="text-center"> {{ $requirement->req_deadline }} </td>
                                        <td>
                                            <div class="text-center">
                                              <a href="{{route('requirement.show', $requirement->id)}}" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#viewRequirementModal{{$requirement->id}}">
                                                  <i class="fas fa-eye"></i>
                                              </a>
                                            </div>
                                            <!-- This below code edit madal Requirement -->
                                            <div class="modal fade" id="viewRequirementModal{{$requirement->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"> Details Requirement </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true"> &times; </span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          @include('requirement.show')
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
                                              <a href="{{route('requirement.edit', $requirement->id)}}" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#EditRequirementModal{{$requirement->id}}">
                                                  <i class="fas fa-edit"></i>
                                              </a>
                                            </div>
                                            <!-- This below code edit madal Requirement -->
                                            <div class="modal fade" id="EditRequirementModal{{$requirement->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"> Edit Requirement </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true"> &times; </span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          @include('requirement.edit')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                                            <button form="editRequirement" type="submit" class="btn btn-outline-success btn-sm"> <i class="far fa-edit"></i> Save </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- End of the edit Requirement modal code -->
                                        </td>
                                        <td class="text-center">
                                          <form action="{{ route('requirement.destroy',$requirement->id)}}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"> <i class="far fa-trash-alt"></i> </button>
                                          </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div> <!-- Backlog section code end  -->

                          <!-- Board section code start  -->
                          <div class="tab-pane fade" id="nav-board" role="tabpanel" aria-labelledby="nav-board-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="text-muted"> Task Board: </h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addTaskModal">
                                            <i class="fas fa-plus"></i> Add Task
                                        </button>
                                    </div>
                                </div>
                                <!-- add task modal code start -->
                                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Add Task </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true"> &times; </span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              @include('task.create',['project_id' => $project->id])
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                                <button form="task" type="submit" class="btn btn-outline-success btn-sm"> <i class="fas fa-plus"></i> Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- add task modal code end -->
                            </div>
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <th class="text-center"> Task Name </th>
                                    <th class="text-center"> People </th>
                                    <th class="text-center"> Priority </th>
                                    <th class="text-center"> Progress </th>
                                    <th class="text-center"> Deadline </th>
                                    <th class="text-center"> Edit </th>
                                    <th class="text-center"> Delete </th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td class="text-center"> {{ $task->task_name }} </td>
                                        <td class="text-center"> {{ $task->people_names }} </td>
                                        <td class="text-center"> {{ $task->task_priority }} </td>
                                        <td class="text-center">
                                          @if ($task->task_progress == 1)
                                            Ongoing
                                          @else
                                            Done
                                          @endif
                                        </td>
                                        <td class="text-center"> {{ $task->task_deadline }} </td>
                                        <td>
                                            <div class="text-center">
                                              <a href="{{route('task.edit', $task->id)}}" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editTaskModal{{$task->id}}">
                                                  <i class="fas fa-edit"></i>
                                              </a>
                                            </div>
                                            <!-- This below code edit madal Requirement -->
                                            <div class="modal fade" id="editTaskModal{{$task->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"> Edit Task </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true"> &times; </span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          @include('task.edit')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> Close </button>
                                                            <button form="edittask" type="submit" class="btn btn-outline-success btn-sm"> <i class="far fa-edit"></i> Save </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- End of the edit Requirement modal code -->
                                        </td>
                                        <td class="text-center">
                                          <form action="{{ route('task.destroy',$task->id)}}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"> <i class="far fa-trash-alt"></i> </button>
                                          </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div> <!-- Board section code end  -->
                      </div> <!-- Tab content code end  -->
                    </div>
                </div>
          </div>
      </div>
  </div>
@endsection
