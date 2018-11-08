<form id="editRequirement" action="{{ route('requirement.update',$requirement->id) }}" method="post">
    @csrf @method('put')
    <input type="hidden" name="project_id" value="{{ $requirement->project_id }}" />
    <div class="form-group">
        <label for="reqname"> Requirement Name: </label>
        <input type="text" name="req_name" value="{{ $requirement->req_name }}" id="reqname" class="form-control">
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="priority"> Priority: {{ $requirement->req_priority }} </label>
                <select name="req_priority"  class="form-control" id="priority">
                    <option value="High"> High </option>
                    <option value="Middle"> Middle </option>
                    <option value="Low"> Low </option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="estimate"> Estimate: </label>
                <input type="text" name="req_estimate" value="{{ $requirement->req_estimate }}" id="estimate" class="form-control">
            </div>
        </div>
    </div>
    <div class="for-group">
        <label for="deadline"> Deadline: </label>
        <input type="date" name="req_deadline" value="{{ $requirement->req_deadline }}" id="deadline" class="form-control">
    </div>
    <div class="for-group">
        <label for="reqDes"> Description: </label>
        <textarea name="req_description" id="reqDes" cols="30" rows="3" class="form-control">{{ $requirement->req_description }}</textarea>
    </div>
</form>
