
  <h4 class="text-center"> {{ $meeting->project_name }} </h4>
  <p class="text-center">
    <span> <b> Date: </b> {{ $meeting->meeting_date }} </span>
    <span> <b> Time: </b> {{ $meeting->meeting_time }} </span>
    <span> <b> Duration: </b> {{ $meeting->meeting_duration }} </span>
  </p>

  <hr>
 <b> Called People: </b>
    @php
    $pizza = $meeting->people_names;
    $pieces = explode(',', $pizza);
    $size = sizeof($pieces)
    @endphp

    @for ($i = 0; $i < $size; $i++)
      <div>
        <p> {{ $i + 1 }}. {{ $pieces[$i] }} </p>
      </div>
    @endfor
  <p class="text-justify"> <b> Description: </b> {{ $meeting->meeting_description}} </p>
