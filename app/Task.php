<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
      'project_id','people_names', 'task_name', 'task_progress', 'task_priority', 'task_deadline'
  ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function peoples()
    {
      return $this->hasMany('App\People');
    }
}
