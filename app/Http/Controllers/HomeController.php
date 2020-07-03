<?php

namespace App\Http\Controllers;

use App\Job;

class HomeController extends Controller {
    public function index() {
        $jobs = Job::join( 'job_types', 'jobs.job_types', 'job_types.id' )
                   ->join( 'companies', 'jobs.companies', '=', 'companies.id' )
                   ->select( 'job_types.class_css as job_name','companies.name as companies_name','jobs.*' )
                   ->take(3)->get();
        return view( 'index', [ 'jobs' => $jobs ] );
    }
}
