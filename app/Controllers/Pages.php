<?php

namespace App\Controllers;

class Pages extends BaseController
{
    protected $modelApar, $modelUsers, $modelProducts, $modelPackages, $modelEvent, $modelAtraction, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->modelApar = new \App\Models\aparModel();
        $this->modelUsers = new \App\Models\usersModel();
        $this->modelAtraction = new \App\Models\atractionModel();
        $this->modelPackages = new \App\Models\packageModel();
        $this->modelProducts = new \App\Models\productModel();
        $this->modelEvent = new \App\Models\eventModel();
        $this->modelSouvenir = new \App\Models\souvenirPlaceModel();
        $this->modelCulinary = new \App\Models\culinaryPlaceModel();
        $this->modelWorship = new \App\Models\worshipPlaceModel();
        $this->modelFacility = new \App\Models\facilityModel();
    }
    // Masuk halaman landing page
    public function index()
    {
        $aparData = $this->modelApar->getApar();
        $galleryData = $this->modelApar->getGallery('1')->getResult();;
        $data = [
            'title' => 'LandingPage | Tourism Village',
            'aparData' => $aparData,
            'galleryData' => $galleryData,
            'config' => config('Auth')
        ];
        return view('pages/index', $data);
    }
    // Masuk halaman landing page
    public function landing_page()
    {
        $data = [
            'title' => 'LandingPage | Tourism Village',
            'config' => config('Auth')
        ];
        return view('pages/landing_page', $data);
    }


    // Masuk Halaman about
    public function about()
    {

        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => 'About | Tourism Village',
            'aparData' => $aparData
        ];
        return view('user-menu/about', $data);
    }

    // Masuk Halaman Dashboard
    public function dashboard()
    {
        $aparData = $this->modelApar->getApar();
        $adminData = $this->modelUsers->getTotal();
        $atractionData = $this->modelAtraction->getTotal();
        $packageData = $this->modelPackages->getTotal();
        $productData = $this->modelProducts->getTotal();
        $spData = $this->modelSouvenir->getTotal();
        $cpData = $this->modelCulinary->getTotal();
        $wpData = $this->modelWorship->getTotal();
        $fData = $this->modelFacility->getTotal();
        $data = [
            'title' => 'Dashboard | Tourism Village',
            'aparData' => $aparData,
            'adminData' => $adminData,
            'atractionData' => $atractionData,
            'packageData' => $packageData,
            'productData' => $productData,
            'spData' => $spData,
            'cpData' => $cpData,
            'wpData' => $wpData,
            'fData' => $fData
        ];
        return view('admin/dashboard', $data);
    }
}
