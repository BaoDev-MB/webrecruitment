<?php

namespace App\Http\Controllers;

use App\Group;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function index() {
        $u     = Session::get( 'auth' );
        $group = Session::get( 'group' );
        if ( $u == null ) {
            $jobs = Job::all()->take( 3 );

            return view( 'index', [ 'jobs' => $jobs, 'u' => $u ,'group'=>$group] );
        } else {
            if ( in_array( 1, $group ) ) {
                $jobs = Job::all()->take( 3 );

                return view( 'index', [ 'jobs' => $jobs,  'u' => $u ,'group'=>$group] );
            } else if ( in_array( 2, $group ) ) {
                $users = User::all()->where( 'group', 4 )->take( 3 );

                return view( 'index', [ 'users' => $users,  'u' => $u ,'group'=>$group] );
            } else if ( in_array( 3, $group ) ) {
                $users = Group::find(4)->users;

                return view( 'index', [ 'users' => $users,  'u' => $u ,'group'=>$group ] );
            } else if ( in_array( 4, $group ) ) {
                $jobs = Job::all()->take( 3 );

                return view( 'index', [ 'jobs' => $jobs,  'u' => $u ,'group'=>$group] );
            }
        }
    }
}
