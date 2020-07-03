<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function  majors(){
        return $this->hasMany('App\Major','majors_id');
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
