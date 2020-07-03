<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function CompanyBy()
    {
        return $this->belongsTo('App\Company','companies');
    }
    public function JobTypeBy()
    {
        return $this->belongsTo('App\JobType','job_types');
    }
    //
    protected $table = 'jobs';

    protected $fillable = [
        'email',
        'job_title',
        'job_types',
        'majors',
//            'salary'=>$request->get('salary'),
        'location',
        'job_tag',
        'description',
        'url',
        'date_expire'
    ];
}
