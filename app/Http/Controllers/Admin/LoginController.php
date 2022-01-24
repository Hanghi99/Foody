<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(LoginRequest $request)
    {
        if ($request->remember = 'remember-me') {
            $remember = true;
        } else {
            $remember = false;
        }
        $arr = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($arr, $remember)) {
            return redirect()->route('users.index');
            // dd('thành công');
        } else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
