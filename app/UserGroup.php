<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserGroup extends Model
{
    //
    protected $table = 'user_groups';
    protected $fillable = [
        'name',
        'description'
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_groups');
    }
}
