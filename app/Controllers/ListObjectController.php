<?php

namespace App\Controllers;

use App\Models\atractionModel;

class ListObjectController extends BaseController
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
        $objectData = null;
        $data = [
            'title' => $this->title,
            'panelList' => 'uniqe atraction',
            'config' => config('Auth'),
            'objectData' => $objectData,
            'aparData' => $aparData
        ];

        return view('user-menu/list_object', $data);
    }

    // Masuk halaman atraction page
    public function atraction($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelAtraction->getAtraction($id)->getResult();
            } else {
                $objectData = $this->modelAtraction->getAtractions();
            }

            $data = [
                'objectData' => $objectData,
                'panelList' => 'List atraction',
                'url' => 'atraction'
            ];
            return json_encode($data);
        }
    }

    // Masuk halaman event page
    public function event($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelEvent->getEvent($id)->getResult();
            } else {
                $objectData = $this->modelEvent->getEvents();
            }

            $data = [
                'objectData' => $objectData,
                'panelList' => 'List event',
                'url' => 'event'
            ];
            return json_encode($data);
        }
    }

    public function souvenir_place($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelSouvenir->getSouvenirPlace($id)->getResult();
            } else {
                $objectData = $this->modelSouvenir->getSouvenirPlaces();
            }
            $data = [
                'objectData' => $objectData,
                'panelList' => 'List souvenir place',
                'url' => 'souvenir_place'
            ];
            return json_encode($data);
        }
    }
    public function culinary_place($id = null)
    {
        //Untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelCulinary->getCulinaryPlace($id)->getResult();
            } else {
                $objectData = $this->modelCulinary->getCulinaryPlaces();
            }
            $data = [
                'objectData' => $objectData,
                'panelList' => 'List culinary place',
                'url' => 'culinary_place'
            ];
            return json_encode($data);
        }
    }
    public function worship_place($id = null)
    {
        //Untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelWorship->getWorshipPlace($id)->getResult();
            } else {
                $objectData = $this->modelWorship->getWorshipPlaces();
            }
            $data = [
                'objectData' => $objectData,
                'panelList' => 'List worship place',
                'url' => 'worship_place'
            ];
            return json_encode($data);
        }
    }
    public function facility($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelFacility->getFacility($id)->getResult();
            } else {
                $objectData = $this->modelFacility->getFacilities();
            }
            $data = [
                'objectData' => $objectData,
                'panelList' => 'List facility',
                'url' => 'facility'
            ];
            return json_encode($data);
        }
    }
    public function search_nearby($distance = null)
    {
        $cp = $_GET['cp'];
        $wp = $_GET['wp'];
        $sp = $_GET['sp'];
        $f =  $_GET['f'];
        $data = [
            'cp' => $cp,
            'wp' => $wp,
            'sp' => $sp,
            'f' => $f
        ];

        return json_encode($data);
    }
}
