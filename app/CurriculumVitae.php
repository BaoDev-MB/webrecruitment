<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    //
    protected $table = 'curriculum_vitaes';

    protected $fillable = [
        'title_cv',
        'job_position',
        'avt',
        'academic_level',
        'work_experience',
        'activity',
        'project_participation',
        'career_goals',
        'skill',
        'prize',
        'certificate',
        'hobby',
        'reference_person',
        'more_information',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'cv_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
