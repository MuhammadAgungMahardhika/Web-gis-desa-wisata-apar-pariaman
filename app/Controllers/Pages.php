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

    // Masuk Halaman about
    public function about()
    {
        $apar = new \App\Models\aparModel();
        $aparData = $apar->getApar();
        $data = [
            'title' => 'About | Tourism Village',
            'aparData' => $aparData
        ];
        return view('user-menu/about', $data);
    }
}
