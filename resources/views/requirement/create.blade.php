<form id="requirement" action="{{ route('requirement.store') }}" method="post">
    @csrf
    <input type="hidden" name="project_id" value="{{ $project_id }}" />
    <div class="form-group">
        <label for="requirementname"> Name: </label>
        <input type="text" name="req_name" id="requirementname" class="form-control" required>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="priority"> Priority: </label>
                <select name="req_priority" class="form-control" id="priority" required>
                    <option value="High"> High </option>
                    <option value="Middle"> Middle </option>
                    <option value="Low"> Low </option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="estimate"> Estimate: </label>
                <input type="text" name="req_estimate" id="estimate" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="for-group">
        <label for="deadline"> Deadline: </label>
        <input type="date" name="req_deadline" id="deadline" class="form-control" required>
    </div>
    <div class="for-group">
        <label for="reqDes"> Description: </label>
        <textarea name="req_description" id="reqDes" cols="30" rows="3" class="form-control"></textarea>
    </div>
</form>
