<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Support\Facades\Session;

class CompanyJobsControler extends Controller
{
   function showJobs(){
       $jobs = Company::find(\session('auth')->company->id)->jobs;
       return view( 'pages.resume.company-jobs' ,['jobs'=>$jobs]);
   }
}
