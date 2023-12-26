<?php

use App\Http\Controllers\HomeController;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function show()
    {
        $tk = Login::all();
        return view('ql.tk.dstk', ['Login' => $tk]);
    }
    public function formthem()
    {
        return view('login.login');
    }
    public function dangky(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
        ], [
            'email.unique' => 'Địa chỉ email đã tồn tại. Vui lòng chọn một địa chỉ email khác.',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        Login::create([
            'ten' => $name,
            'email' => $email,
            'password' => $password,
            'diachi' => '',
            'sdt' => '',
            'imgpro' => ''
        ]);
        session()->flash('success', 'Đăng nhập vào nếu bạn đã đăng ký thành công!');
        return redirect()->route('login');
    }
    public function dangnhap(Request $request)
    {
        session()->forget('user');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (isset($user)) {
                $nd = session('user', []);
                $a = [
                    'email' => $user->email,
                    'ten' => $user->ten,
                ];
                $nd[] = $a;
                session()->put('user', $nd);
                // Kiểm tra xem email có phải là "admin@1" hay không
                if ($user->email == 'admin@1') {
                    return redirect()->intended(route('homead'));
                } else {
                    return redirect()->intended(route('home'));
                }
            }
        } else {
            return redirect()->back()->with('error', 'Bạn đã nhập sai email hoặc password hãy kiểm tra lại !');
        }
    }
    public function dangXuat()
    {
        Auth::logout();
        session()->forget('user');
        return redirect()->route('login');
    }
}
