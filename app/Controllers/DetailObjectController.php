<?php

namespace App\Controllers;

use App\Models\atractionModel;

class DetailObjectController extends BaseController
{

    protected $modelReview, $modelApar, $modelEvent, $modelAtraction, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->modelReview = new \App\Models\reviewModel();

        $this->modelApar = new \App\Models\aparModel();
        $this->modelAtraction = new \App\Models\atractionModel();
        $this->modelEvent = new \App\Models\eventModel();
        $this->modelSouvenir = new \App\Models\souvenirPlaceModel();
        $this->modelCulinary = new \App\Models\culinaryPlaceModel();
        $this->modelWorship = new \App\Models\worshipPlaceModel();
        $this->modelFacility = new \App\Models\facilityModel();
    }

    public function atraction($id = null)
    {
        $count_like = $this->modelReview->getLikes($id);
        $objectData = $this->modelAtraction->getAtraction($id)->getRow();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'count_like' => $count_like,
                'objectData' => $objectData,
                'url' =>  'atraction',
                'aparData' => $this->modelApar->getApar()
            ];
            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function event($id = null)
    {
        $objectData = $this->modelEvent->getEvent($id)->getRow();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'url' => 'event',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function culinary_place($id = null)
    {
        $objectData = $this->modelCulinary->getCulinaryPlace($id)->getRow();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'url' => 'culinary_place',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function worship_place($id = null)
    {
        $objectData = $this->modelWorship->getWorshipPlace($id)->getRow();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'url' => 'worship_place',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function souvenir_place($id = null)
    {
        $objectData = $this->modelSouvenir->getSouvenirPlace($id)->getRow();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'url' => 'souvenir_place',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function facility($id = null)
    {
        $objectData = $this->modelFacility->getFacility($id)->getRow();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'url' => 'facility',
                'aparData' => $this->modelApar->getApar()
            ];
            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
