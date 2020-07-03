<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactJobType extends Model
{
    //
    protected $table = 'job_jobtype';
    protected $fillable = [
        'job_id',
        'jobtype_id',
    ];
    public function job(){
        return $this->hasOne('App\Job');
    }
    public function jobtype(){
        return $this->hasOne('App\JobType');
    }
}
