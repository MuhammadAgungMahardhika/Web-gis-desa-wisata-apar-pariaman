<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    // Masuk halaman login
    public function login()
    {
        $data = [
            'title' => 'Login | Tourism Village',
            'config' => config('Auth')
        ];
        if (logged_in() == true && uri_string() == 'login') {
            return redirect('list_object');
        }
        return view('auth/login', $data);
    }

    // Masuk Halaman register
    public function register()
    {
        $data = [
            'title' => 'Register | Tourism Village',
            'config' => config('Auth')
        ];

        if (logged_in() == true && uri_string() == 'register') {
            return redirect('home');
        }

        return view('auth/register', $data);
    }
}
