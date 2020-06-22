<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('pages.login');
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
                return redirect('/');
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
}
