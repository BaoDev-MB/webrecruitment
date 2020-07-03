<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobType;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        $query = DB::table('jobs')
//            ->join('job_types', 'jobs.job_types', '=', 'job_types.id')
//            ->join('companies', 'jobs.companies', '=', 'companies.id');
//
//        $jobs =$query->select('jobs.*')->get();
//
//        $companiesName= $query->select('companies.name')->get();
//
//        $job_typeName= $query->select('job_types.name','job_types.css_class')->get();

        return view('index');
    }
}
