<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return view('/login');
        }
    }
    public function postlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        } else {
            return back()->with([
                'loginError' => 'email atau Password salah',

            ]);
        }
    }

    public function registrasi()
    {
        return view('/register');
    }

    public function simpanregistrasi(Request $request)
    {
        //   dd($request->all());
        User::create([
            'name' => $request->nama,
            'level' => 'siswa',
            'email' => $request->email,
            'password' => md5($request->password),
            'remember_token' => Str::random(60)
        ]);

        // $this->validate($request, [
        //     'nama' => 'required|min:5|max:20',
        //     'level' => 'siswa',
        //     'email' => 'required|unique',
        //     'password' => 'md5($request->password|min:8)'

        // ]);
        return view('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
