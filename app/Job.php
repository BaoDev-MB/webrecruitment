<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    public function  majors()
    {
        return $this->belongsTo('App\Major');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function  jobtypes()
    {
        return $this->belongsToMany(JobType::class, 'job_jobtype', 'job_id', 'jobtype_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_job');
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
        'requirements',
        'benefits',
        'url',
    ];
    //

    protected $table = 'jobs';
}
