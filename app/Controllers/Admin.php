<?php

namespace App\Controllers;

class Admin extends BaseController
{

    protected $db, $builder;
    // Constructor
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    // 3. Manage atraction
    public function manage_atraction()
    {
        $data = [
            'title' => 'manage_atraction | Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_atraction', $data);
    }
    // 4. Manage apar information
    public function manage_apar()
    {
        $data = [
            'title' => 'manage_apar | Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_apar', $data);
    }

    // 5. Manage event
    public function manage_event()
    {
        $data = [
            'title' => 'manage_event | Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_event', $data);
    }
    // 6. Manage souvenir place
    public function manage_souvenir_place()
    {
        $data = [
            'title' => 'manage_souvenir_place | Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_souvenir_place', $data);
    }
    // 7. Manage culinary place
    public function manage_culinary_place()
    {
        $data = [
            'title' => 'culinary_place | Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_culinary_place', $data);
    }
    // 8. Manage worship place
    public function  manage_worship_place()
    {
        $data = [
            'title' => 'manage_worship_place| Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_worship_place', $data);
    }
    // 9. Manage facility
    public function manage_facility()
    {
        $data = [
            'title' => 'manage_facility | Tourism Village',
            'config' => config('Auth')
        ];

        return view('admin/manage_facility', $data);
    }
}
