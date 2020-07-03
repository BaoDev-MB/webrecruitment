<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    public function  majors(){
        return $this->belongsTo('App\Major');
    }
    public function  job_types(){
        return $this->belongsToMany(JobType::class, 'job_jobtype','job_id','jobtype_id');
    }
    protected $fillable = [
        'majors_id',
        'companies_id',
        'job_types_id',
        'job_title',
        'email',
        'date_posted',
        'date_expire',
        'job_tag',
//            'salary'=>$request->get('salary'),
        'location',
        'job_tag',
        'description',
        'url',
    ];
    //

    protected $table = 'jobs';

}
