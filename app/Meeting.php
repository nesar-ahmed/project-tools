<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
  protected $fillable = [
      'project_name', 'people_names', 'meeting_date', 'meeting_time', 'meeting_duration', 'meeting_description'
  ];
}
