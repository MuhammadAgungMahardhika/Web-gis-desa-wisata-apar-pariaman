<?php

namespace App\Controllers;


class productController extends BaseController
{
    protected $model, $modelApar;
    protected $title =  'Tourism Package | Tourism Village';
    public function __construct()
    {
        $this->model = new \App\Models\productModel();
        $this->modelApar = new \App\Models\aparModel();
    }

    public function culinary()
    {
        //direct biasa
        $objectData = $this->model->getCulinary()->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData,
            'aparData' => $aparData
        ];
        return view('user-menu/culinary', $data);
    }
    public function souvenir()
    {
        $objectData = $this->model->getSouvenir()->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData,
            'aparData' => $aparData
        ];
        return view('user-menu/souvenir', $data);
    }
}
