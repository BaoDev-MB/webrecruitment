<?php

namespace App\Http\Controllers;

use App\Job;

class HomeController extends Controller {
    public function index() {
        $jobs = Job::all()->take(3);
        return view( 'index', [ 'jobs' => $jobs ] );
    }
}
