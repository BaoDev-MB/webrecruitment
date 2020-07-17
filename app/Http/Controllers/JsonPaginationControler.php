<?php

namespace App\Http\Controllers;

use App\Group;
use App\Job;
use Illuminate\Http\Request;

class JsonPaginationControler extends Controller
{
    public function getPageForJob(){
        return response()->json(Job::with('jobtypes','company')->paginate(4),200,['Content-type'=> 'application/json; charset=utf-8'],JSON_UNESCAPED_UNICODE );
    }
    public function getPageForResume(){
        $u= \session('auth');
        $majorid = $u->company->major->id;
        $users = Group::find(4)->users()->where('major_id',$majorid)->get();
        return response()->json($users->paginate(4),200,['Content-type'=> 'application/json; charset=utf-8'],JSON_UNESCAPED_UNICODE );
    }
}
