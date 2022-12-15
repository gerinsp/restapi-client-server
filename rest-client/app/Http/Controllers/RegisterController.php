<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $register = Http::post('http://127.0.0.1:7000/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($register->successful()){
            return redirect('/register')->with('success', 'Selamat anda berhasil melakukan registrasi!');
        }

        if($register->failed()){
            return redirect('/register')->with('failed', 'Registrasi anda gagal!');
        }
    }
}
