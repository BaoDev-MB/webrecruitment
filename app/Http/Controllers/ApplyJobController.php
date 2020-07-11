<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class ApplyJobController extends Controller {

    function applyJob() {
        try {
            // kiểm tra đa login hay chưa
            if(($u=Session::get( 'auth' ))!=null) {
                $id = \request()->get( 'id' );
                $u->jobs()->attach( $id );
                // trả về trang hiện tại với message thành công
                return  redirect()->back()->with('mes','Bạn đã apply thành công');
            }else{
                return  redirect('login')->withErrors(['mes'=>'Bạn chưa đăng nhập.']);
            }
        }catch (\Throwable $e){
            // đã apply vào job rồi thì thông báo đã apply
            return 'Bạn đã apply';
        }
    }
}
