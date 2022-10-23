<?php

namespace App\Controllers;

use App\Models\atractionModel;

class productController extends BaseController
{
    protected $model;
    protected $title =  'Tourism Package | Tourism Village';
    public function __construct()
    {
        $this->model = new \App\Models\productModel();
    }

    public function culinary()
    {
        //direct biasa
        $objectData = $this->model->getCulinary()->getResult();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];
        return view('user-menu/culinary', $data);
    }
    public function souvenir()
    {
        $objectData = $this->model->getSouvenir()->getResult();

        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];
        return view('user-menu/souvenir', $data);
    }
}
