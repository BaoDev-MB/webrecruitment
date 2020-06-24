<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\ActiveAcount;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    //
    public function showRegister()
    {
        return view('pages.auth', ['register' => '#tab2']);
    }

    public function doRegister(Request $request)
    {
        Session::put('signup', true);
        $u = $request->validate([
            'r_full_name' => 'required|min:3|max:50',
            'r_email' => 'required|email|unique:users,email',
            'r_pass' => 'required|min:8',
            'r_repass' => 'required|same:pass',
        ],$this->messages());
        Session::forget('signup');

        $user = new User($u);
        $user->password = Hash::make($request->input('pass'));
        $key = openssl_random_pseudo_bytes(200);
        $time = now();
        $hash = md5($key . $time);
        echo ($request->input('email') . "           " . $hash . "     " . $request->input('name'));

        Mail::to($request->input('email'))->send(new ActiveAcount($request->input('email'), $hash, $request->input('name')));

        $user->random_key = $hash;
        $user->key_time = Carbon::now();
        $user->save();

        return redirect('login')->with('ok', 'Bạn đăng ký thành công vui lòng check Email để kích hoạt tài khoản');


        return $request->email + " " + $request->password;

    }

    public function register()
    {
        Session::put('signup', true);
        return redirect('login');
    }

    public function confirmEmail($email, $key)
    {
        //		Session::forget( 'signup' );
        $u = User::select('id', 'email', 'random_key', 'active')
            ->where('email', '=', $email)
            ->where('active', '=', '0')->get();

        if (count($u) == 1 && $u[0]->email == $email && $u[0]->random_key == $key) {
            //			$kt = Carbon::createFromFormat( 'Y-m-d H:i:s', $u[0]->key_time );
            //			$kt->addHours( 24 );
            //			$now = Carbon::now();
            //			if ( $now->lt( $kt ) == true ) {
            $u[0]->active = 1;
            $u[0]->random_key = '';

            $u[0]->save();
            //			Session::put( 'ok', 123 );

            return redirect('login')->with('ok', 'Xác nhận email thành công! Bạn có thể đăng nhập.');
            //			} else {
            //				return \view('auth.login')->with( 'ok', 'Xác nhận email không thành công! Thời gian xác thực quá hạn.' );
            //			}
        } else {
            return redirect('login')->withErrors(['mes' => 'Xác nhận email không thành công! Email hoặc mã xác thực không đúng. ']);
        }
    }
    private function messages()
    {
        return [
            'r_full_name.required' => 'Bạn cần nhập họ tên',
            'r_full_name.min' => 'Họ tên cần lớn hơn 3 kí tự',
            'r_full_name.max' => 'Họ tên cần bé hơn 50 kí tự',
            'r_email.required' => 'Bạn cần phải nhập Email.',
            'r_email.email' => 'Định dạng Email bị sai.',
            'r_email.unique'=>'Email đã tồn tại',
            'r_pass.required' => 'Bạn cần phải nhập Password.',
            'r_pass.min' => 'Password phải nhiều hơn 8 ký tự.',
            'r_repass.same' => 'RePassword không trùng với password',
            'r_pass.required' => 'Bạn cần nhập Repassword',
        ];
    }
}
