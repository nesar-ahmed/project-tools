<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
  protected $fillable = [
      'project_id','req_name', 'req_deadline', 'customer_priority', 'req_estimate', 'req_description'
  ];
  public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
