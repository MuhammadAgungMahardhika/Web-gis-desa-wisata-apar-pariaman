<?php

namespace App\Controllers;

class Pages extends BaseController
{
    // Masuk halaman landing page
    public function index()
    {
        $data = [
            'title' => 'LandingPage | Tourism Village',
            'config' => config('Auth')
        ];
        return view('pages/index', $data);
    }

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

        return view('pages/login', $data);
    }

    // Masuk Halaman about
    public function about()
    {
        $apar = new \App\Models\aparModel();
        $aparData = $apar->getApar();
        $data = [
            'title' => 'About | Tourism Village',
            'aparData' => $aparData
        ];
        return view('pages/about', $data);
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

        return view('pages/register', $data);
    }
}
