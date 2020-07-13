<?php

namespace App\Http\Controllers;

use App\Group;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    public function index() {
        $u = Session::get( 'auth' );
        $groups = Session::get( 'group' );
        if ( $u == null || $groups == null ) {
            $jobs = Job::all()->take( 3 );
            return view( 'index', [ 'jobs' => $jobs, 'u' => $u, 'group' => $groups ] );
        } else {
            if ( in_array( 1, $groups ) ) {
                $jobs = Job::all()->take( 3 );

                return view( 'index', [ 'jobs' => $jobs, 'u' => $u, 'group' => $groups ] );
            } else if ( in_array( 2, $groups ) ) {
                $users = User::all()->where( 'group', 4 )->take( 3 );

                return view( 'index', [ 'users' => $users, 'u' => $u, 'group' => $groups ] );
            } else if ( in_array( 3, $groups ) ) {
                $users = Group::find( 4 )->users;

                return view( 'index', [ 'users' => $users, 'u' => $u, 'group' => $groups ] );
            } else if ( in_array( 4, $groups ) ) {
                $jobs = Job::all()->take( 3 );

                return view( 'index', [ 'jobs' => $jobs, 'u' => $u, 'group' => $groups ] );
            }else{
                $jobs = Job::all()->take( 3 );
                return view( 'index', [ 'jobs' => $jobs, 'u' => $u, 'group' => $groups ] );
            }
        }
    }
}
