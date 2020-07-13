<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    //
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_jobtype', 'job_id', 'jobtype_id');
    }

    protected $table = 'job_types';
    protected $fillable = [
        'job_ib',
        'name'
    ];
}
