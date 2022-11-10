<?php

namespace App\Controllers;


class packageController extends BaseController
{
    protected $model, $modelApar, $modelFp, $modelAc;
    protected $title =  'Tourism Package | Tourism Village';
    public function __construct()
    {
        $this->model = new \App\Models\packageModel();
        $this->modelApar = new \App\Models\aparModel();
        $this->modelFp = new \App\Models\facilityPackageModel();
        $this->modelAc = new \App\Models\activitiesModel();
    }

    public function packages()
    {
        //direct biasa
        $objectData = $this->model->getPackages();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData,
            'aparData' => $aparData
        ];
        return view('user-menu/package', $data);
    }
    public function package($id)
    {
        $objectData = $this->model->getPackage($id)->getRow();
        $aparData = $this->modelApar->getApar();
        $facilityPackage = $this->modelFp->getFacilityPackage($id)->getResult();
        $activitiesData = $this->modelAc->getPackageActivity($id)->getResult();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData,
            'aparData' => $aparData,
            'facilityPackage' => $facilityPackage,
            'activitiesData' => $activitiesData

        ];
        return view('user-menu/detail_package', $data);
    }

    public function getActivityGallery($id)
    {
        $objectData = $this->modelAc->getActivity($id)->getResult();
        $galleryData = $this->modelAc->getGallery($id)->getResult();
        $data['galleryData'] = $galleryData;
        $data['objectData'] = $objectData;
        return json_encode($data);
    }
}
