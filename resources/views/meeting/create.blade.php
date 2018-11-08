<form id="meeting" action="{{ route('meeting.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <div class="form-row">
            <div class="col-lg-6">
                <label for="selectProject"> Project Name: </label>
                <select class="form-control{{ $errors->has('project_name') ? ' is-invalid' : '' }}" name="project_name" id="selectProject">
                    <option selected> Choose Project........... </option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->project_name}}"> {{ $project->project_name}} </option>
                    @endforeach
                </select>
                @if ($errors->has('project_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('project_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-6">
                <label for="selectProject"> Add People: </label>
                <select class="form-control" multiple name="people_names[]" id="selectProject" required>
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
                <label for="meetingDate"> Meeting Date: </label>
                <input type="date" name="meeting_date" id="meetingDate" class="form-control{{ $errors->has('meeting_date') ? ' is-invalid' : '' }}">
                @if ($errors->has('meeting_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('meeting_date') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-4">
                <label for="meetingTime"> Meeting Time: </label>
                <input type="time" name="meeting_time" id="meetingTime" class="form-control{{ $errors->has('meeting_time') ? ' is-invalid' : '' }}">
                @if ($errors->has('meeting_time'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('meeting_time') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-3">
                <label for="meetingDuration"> Duration: </label>
                <input type="text" name="meeting_duration" id="meetingDuration" class="form-control{{ $errors->has('meeting_duration') ? ' is-invalid' : '' }}">
                @if ($errors->has('meeting_duration'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('meeting_duration') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="projectDescription"> Description: </label>
        <textarea class="form-control{{ $errors->has('meeting_description') ? ' is-invalid' : '' }}" name="meeting_description" id="projectDescription" cols="30" rows="3"></textarea>
        @if ($errors->has('meeting_description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('meeting_description') }}</strong>
            </span>
        @endif
    </div>
</form>
