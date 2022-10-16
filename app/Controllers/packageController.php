<?php

namespace App\Controllers;

use App\Models\atractionModel;

class packageController extends BaseController
{
    protected $modelApar, $modelEvent, $modelAtraction, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->modelApar = new \App\Models\aparModel();
        $this->modelAtraction = new \App\Models\atractionModel();
        $this->modelEvent = new \App\Models\eventModel();
        $this->modelSouvenir = new \App\Models\souvenirPlaceModel();
        $this->modelCulinary = new \App\Models\culinaryPlaceModel();
        $this->modelWorship = new \App\Models\worshipPlaceModel();
        $this->modelFacility = new \App\Models\facilityModel();
    }

    public function index()
    {
        //direct biasa
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title
        ];

        return view('user-menu/package', $data);
    }
}
