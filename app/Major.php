<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
    protected $table = 'majors';
    public function job()
    {
        return $this->hasMany(Job::class, 'majors_id','id');
    }
}
