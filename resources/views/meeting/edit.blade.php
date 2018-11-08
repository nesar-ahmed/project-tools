<form id="editMeeting" action="{{ route('meeting.update', $meeting->id)}}" method="POST">
    @csrf @method('put')
    <div class="form-group">
        <div class="form-row">
            <div class="col-lg-6">
                <label for="selectProject"> Project Name: </label>
                <select class="form-control" name="project_name" id="selectProject">
                    <option selected> Choose Project........... </option>
                    @foreach ($projects as $project)
                      <option value="{{ $project->project_name}}" @if ($project->project_name == $meeting->project_name)  selected class="text-primary" @endif> {{ $project->project_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6">
                <label for="selectProject"> Add People: </label>
                <select class="form-control" multiple name="people_names[]" id="selectProject">
                    @foreach ($peoples as $people)
                    <option value="{{ $people->name}}"> {{ $people->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col-lg-5">
                <label for="meetingDate"> Date: </label>
                <input type="date" name="meeting_date" value="{{ $meeting->meeting_date }}" id="meetingDate" class="form-control" required>
            </div>
            <div class="col-lg-4">
                <label for="meetingTime"> Time: </label>
                <input type="time" name="meeting_time" value="{{ $meeting->meeting_time }}" id="meetingTime" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="meetingDuration"> Duration: </label>
                <input type="text" name="meeting_duration" value="{{ $meeting->meeting_duration}}" id="meetingDuration" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="projectDescription"> Description: </label>
        <textarea class="form-control" name="meeting_description" id="projectDescription" cols="30" rows="3" required>{{ $meeting->meeting_description}}</textarea>
    </div>
</form>




{{-- <form id="editMeeting" action="{{ route('people.update',$meeting->id) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <div class="form-row">
            <div class="col-lg-6">
                <label for="selectProject"> Project Name: </label>
                <select class="form-control" name="project_name" id="selectProject">
                    @foreach ($projects as $project)
                      <option value="{{ $project->project_name}}" @if ($project->project_name == $meeting->project_name)  selected class="text-primary" @endif> {{ $project->project_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6">
                <label for="selectProject"> Add People: {{$meeting->people_names}} </label>
                <select class="form-control" multiple name="people_names[]" id="selectProject">
                    @foreach ($peoples as $people)
                     <option value="{{ $people->name }}"> {{ $people->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col-lg-5">
                <label for="meetingDate"> Date: </label>
                <input type="date" name="meeting_date" value="{{ $meeting->meeting_date}}" id="meetingDate" class="form-control" required>
            </div>
            <div class="col-lg-4">
                <label for="meetingTime">  Time: </label>
                <input type="time" name="meeting_time" value="{{ $meeting->meeting_time}}" id="meetingTime" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="meetingDuration">  Duration: </label>
                <input type="text" name="meeting_duration" value="{{ $meeting->meeting_duration}}" id="meetingDuration" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="projectDescription"> Description: </label>
        <textarea class="form-control" name="meeting_description" id="projectDescription" cols="30" rows="3" required>{{ $meeting->meeting_description}}</textarea>
    </div>
</form> --}}
