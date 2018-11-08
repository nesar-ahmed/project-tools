<form id="edittask" action="{{ route('task.update', $task->id) }}" method="post">
    @csrf @method('put')
    <input type="hidden" name="project_id" value="{{ $task->project_id }}" />
    <div class="form-group">
        <label for="taskName"> Task Name: </label>
        <input type="text" name="task_name" id="taskName" value="{{ $task->task_name}}" class="form-control">
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="editTaskPriority"> Task Priority: </label>
                <select name="task_priority" class="form-control" id="editTaskPriority">
                  <option value="High" @if ($task->task_priority == "High")  selected @endif> High </option>
                  <option value="Low"  @if ($task->task_priority == "Low")  selected @endif> Low </option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="editTaskProgress"> Task Progress: </label>
                <select name="task_progress" class="form-control" id="editTaskProgress">
                  <option value="1" @if ($task->task_progress == "1")  selected @endif> Ongoing </option>
                  <option value="2"  @if ($task->task_progress == "2")  selected @endif> Done </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="editdeadline"> Deadline: </label>
        <input type="date" name="task_deadline" id="editdeadline" value="{{ $task->task_deadline }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="editSelectPeople"> Assign People: {{ $task->people_names }} </label>
        <select class="form-control" name="people_names" id="editSelectPeople">
            @foreach ($peoples as $people)
            <option value="{{ $people->name}}"> {{ $people->name}} </option>
            @endforeach
        </select>
    </div>
</form>
