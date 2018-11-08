<h4 class="text-center text-success"> {{ $requirement->req_name }} </h4>

<div class="row">
  <div class="col-lg-4">
    <p> <b> Priority: </b> {{ $requirement->req_priority }} </p>
  </div>
  <div class="col-lg-3">
    <p> <b> Estimate: </b> {{ $requirement->req_estimate }} </p>
  </div>
  <div class="col-lg-5">
    <p> <b> Deadline: </b> {{ $requirement->req_deadline }} </p>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <p class="text-justify"> <b> Description: </b> {{ $requirement->req_description}} </p>
  </div>
</div>
