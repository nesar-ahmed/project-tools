<form id="task" action="{{ route('task.store') }}" method="post">
    @csrf
    <input type="hidden" name="project_id" value="{{ $project_id }}" />
    <div class="form-group">
        <label for="taskName"> Task Name: </label>
        <input type="text" name="task_name" id="taskName" class="form-control" required>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="taskPriority"> Task Priority: </label>
                <select name="task_priority" class="form-control" id="taskPriority" required>
                    <option value="High"> High </option>
                    <option value="Low"> Low </option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="taskProgress"> Task Progress: </label>
                <select name="task_progress" class="form-control" id="taskProgress" required>
                    <option value="1"> Ongoing </option>
                    <option value="2"> Done </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="deadline"> Deadline: </label>
        <input type="date" name="task_deadline" id="deadline" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="selectPeople"> Assign People: </label>
        <select class="form-control" name="people_names" id="selectPeople">
            @foreach ($peoples as $people)
            <option value="{{ $people->name}}"> {{ $people->name}} </option>
            @endforeach
        </select>
    </div>
</form>
