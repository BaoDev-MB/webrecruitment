<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class ApplyJobController extends Controller {

    function applyJob() {
        try {
                // kiểm tra tài khoảnh doanh nghiệp
//            dd(\session('group'));
                if(in_array(3,\session('group'))||
                   in_array(2,\session('group'))||
                   in_array(1,\session('group'))){
                    return  redirect('/')->withErrors(['mes','Bạn không thể apply']);
                }
                $id = \request()->get( 'id' );
                \session('auth')->jobs()->attach( $id );
                // trả về trang hiện tại với message thành công
                return  redirect()->back()->with('mes','ok');
        }catch (\Throwable $e){
            // đã apply vào job rồi thì thông báo đã apply
            return  redirect()->back()->with('mes','fail');
        }
    }
}
