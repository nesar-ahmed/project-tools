<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
  protected $fillable = [
      'name', 'profession', 'email'
  ];
  public function task()
  {
      return $this->belongsTo('App\Task');
  }
}
