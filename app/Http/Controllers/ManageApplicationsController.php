<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageApplicationsController extends Controller
{
    //
    public function index()
    {
        return view('pages.job.dashboard-manage-applications');
    }
}
