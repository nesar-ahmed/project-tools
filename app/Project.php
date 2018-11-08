<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name', 'project_deadline', 'customer_name', 'customer_phone', 'customer_email', 'project_description'
    ];
    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
