<?php

namespace App\Http\Controllers;

use App\Mail\ActiveAcount;
use App\Mail\ForgetPass;
use App\Mail\ForgetPass1;
use App\User;
use App\Blog;
use App\Windows;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $r)
    {
        $r->validate([
            'email' => 'required|email',
            'pass' => 'required|min:8',
        ], $this->messages());
        $users = User::select('id', 'email', 'password')
            ->where('email', '=', $r->get('email'))
            ->where('active', '=', '1')->get();
        if (count($users) == 1) {
            $u = $users[0];
            if ($u->email == $r->get('email') && Hash::check($r->get('pass'), $u->password)) {
                $u = User::select('id', 'name', 'email', 'password', 'group', 'avt', 'phone', 'gender', 'studentcode', 'dateofbirth')
                    ->where('id', '=', $u->id)
                    ->where('active', '=', '1')->first();
                Session::put('auth', $u);

                return view('auth.loginok');
            } else {
                return redirect()->back()
                    ->withInput($r->only('email'))
                    ->withErrors(['mes' => 'Bạn đã nhập sai Email hoặc Password']);
            }
        } else {
            return redirect()->back()->withInput($r->only('email'))->withErrors(['mes' => 'Bạn đã nhập sai Email hoặc Password']);
        }
    }

    private function messages()
    {
        return [
            'email.required' => 'Bạn cần phải nhập Email.',
            'pass.required' => 'Bạn cần phải nhập Password.',
            'email.email' => 'Định dạng Email bị sai.',
            'pass.min' => 'Password phải nhiều hơn 8 ký tự.',
        ];
    }

    public function doSignup(Request $request)
    {
        Session::put('signup', true);
        $u = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email|unique:users',
            'pass' => 'required|min:8',
            'repass' => 'required|same:pass',
            'phone' => '',
            'gender' => '',
        ]);
        Session::forget('signup');

        $user = new User($u);
        $user->password = Hash::make($request->input('pass'));
        $key = openssl_random_pseudo_bytes(200);
        $time = now();
        $hash = md5($key . $time);
         echo($request->input('email') ."           " .$hash."     ".$request->input('name') );

         Mail::to($request->input('email'))->send(new ActiveAcount
        ($request->input('email'), $hash, $request->input('name')));

        $user->random_key = $hash;
        $user->key_time = Carbon::now();
        $user->save();


        return redirect('login')->with('ok', 'Bạn đăng ký thành công vui lòng check Email để kích hoạt tài khoản');
    }

    public function profile(Request $request)
    {
        return view('auth.profile');
    }

    public function doProfile(Request $request)
    {

        Session::get('auth')->name = $request->name;
        Session::get('auth')->email = $request->email;
        Session::get('auth')->phone = $request->phone;
        Session::get('auth')->studentcode = $request->studentcode;
        Session::get('auth')->dateofbirth = $request->dateofbirth;
        Session::get('auth')->gender = $request->gender;
        Session::get('auth')->save();
        echo $request->input('gender');

        return view('auth.profile');
    }

    public function doLogout()
    {
        Session::forget('auth');

        return \redirect('/');
    }

    public function editProfile()
    {

        return view('auth.editprofile');
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
