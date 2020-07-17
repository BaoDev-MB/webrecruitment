<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JsonPaginationControler extends Controller
{
    public function getPage(){
        return response()->json(Job::with('jobtypes','company')->paginate(4),200,['Content-type'=> 'application/json; charset=utf-8'],JSON_UNESCAPED_UNICODE );
    }

}
