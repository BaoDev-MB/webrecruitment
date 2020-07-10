<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function index() {
        $u=Session::get('auth');
        if($u==null) {
            $jobs = Job::all()->take( 3 );
            return view( 'index', [ 'jobs' => $jobs ,'u'=>$u] );
        }else if($u->group==4){
            $jobs = Job::all()->take( 3 );
            return view( 'index', [ 'jobs' => $jobs,'u'=>$u ] );
        }else if($u->group==3){
            $users = User::all()->where('group',4)->take(3);
            return  view('index', [ 'users' => $users ,'u'=>$u]);
        }
    }
}
