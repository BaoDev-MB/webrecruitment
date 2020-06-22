<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPass;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function forgetPass()
    {
        return \view('auth.confirmemail');
    }

    public function doForgetPass(Request $request)
    {
        $u = User::select('id', 'email')
            ->where('email', '=', $request->email)
            ->where('active', '=', '1')->get();
        if (count($u) == 1) {

            $key = openssl_random_pseudo_bytes(200);
            $time = now();
            $hash = md5($key . $time);
            Mail::to($request->input('email'))->send(new ForgetPass
            ($request->input('email'), $hash, $request->input('name')));
            $u[0]->random_key = $hash;
            $u[0]->key_time = Carbon::now();
            $u[0]->save();
            $mess = 'Chúng tôi đã gửi một mail đến email ' . $request->email . ' vui lòng vào mail nhấn vào link đính kèm để tiến hành đổi mật khẩu.';

            return \redirect()->back()->with('ok', $mess);

//			return view('auth.confirmemail')->with( 'ok', 'Bạn đăng ký thành công vui lòng check Email để kích hoạt tài khoản' );
        } else {
            return \redirect()->back()->withErrors('Email không tồn tại, hoặc chưa đăng ký.');
        }
    }

    public function doConfirmPassword($email, $key)
    {

        $u = User::select('id', 'email', 'random_key', 'key_time', 'active')
            ->where('email', '=', $email)
            ->where('active', '=', '1')->get();

        if (count($u) == 1 && $u[0]->email == $email && $u[0]->random_key == $key) {
            $kt = Carbon::createFromFormat('Y-m-d H:i:s', $u[0]->key_time);
            $kt->addHours(24);
            $now = Carbon::now();
            if ($now->lt($kt) == true) {

                return \view('auth.confirmforgetpass')->with([
                    'email' => $email,
                    'key' => $key,
                ]);

            } else {
                return \view('auth.errormail')->with('ok', 'Mail đã hết hạn sử dụng');
            }
        } else {
            return \view('auth.errormail')->withErrors(['mes' => 'Đường dẫn này chỉ được sử dụng được một lần']);
        }
    }

    public function resetPass($email, $key, Request $request)
    {
        $request->validate([
            'pass' => 'required|min:8',
            're-pass' => 'required|same:pass',
        ]);
        $u = User::select('id', 'email', 'random_key', 'key_time', 'active')
            ->where('email', '=', $email)
            ->where('active', '=', '1')->get();
        if (count($u) == 1 && $u[0]->email == $email) {
            $u[0]->password = bcrypt($request->pass);
            $u[0]->random_key = '';
            $u[0]->save();
            return redirect('login')->with('ok', 'Password đã được thay đổi');
        }
    }

}
