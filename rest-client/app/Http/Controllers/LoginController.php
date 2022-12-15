<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{

    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function autenticate(Request $request)
    {
        $login = json_decode(Http::post('http://127.0.0.1:7000/api/login', [
            'email' => $request->email,
            'password' => $request->password
        ]), true);
        if($login['success'] == 'true'){
            $request->session()->regenerate();
            $request->session()->put($login);
            return redirect()->intended('movie')->with('success', 'Login berhasil!');
        }

        return back()->with('loginErorr', 'Login failed!');
    }

    public function logout(Request $request)
    {
        $token = session()->get('token');
        $login = json_decode(Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$token}"
        ])->post('http://127.0.0.1:7000/api/logout'), true);

        if($login['success'] == 'true'){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $request->session()->forget('login');
            return redirect('login')->with('success', 'Logout berhasil!');
        }

        return back()->with('failed', 'Logout failed!');
    }
}
