<?php

namespace App\Controllers;

use App\Models\atractionModel;

class packageController extends BaseController
{
    protected $model, $modelFp, $modelAc;
    protected $title =  'Tourism Package | Tourism Village';
    public function __construct()
    {
        $this->model = new \App\Models\packageModel();
        $this->modelFp = new \App\Models\facilityPackageModel();
        $this->modelAc = new \App\Models\activitiesModel();
    }

    public function packages()
    {
        //direct biasa
        $objectData = $this->model->getPackages();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];
        return view('user-menu/package', $data);
    }
    public function package($id)
    {
        $objectData = $this->model->getPackage($id)->getRow();
        $activitiesData = $this->modelAc->getActivities($id)->getResult();
        $activitiesGallery = array();
        foreach ($activitiesData as $activities) {
            array_push($activitiesGallery, $this->modelAc->getGallery($activities->id)->getResult());
        }
        $facilityPackage = $this->modelFp->getFacilityPackage($id)->getResult();

        $data = [
            'title' => $this->title,
            'objectData' => $objectData,
            'facilityPackage' => $facilityPackage,
            'activitiesData' => $activitiesData,
            'activitiesGallery' => $activitiesGallery
        ];
        return view('user-menu/detail_package', $data);
    }
}
