<?php

namespace App\Controllers;

use App\Models\RuanganModel;

class Ruangan extends BaseController
{
    protected $ruangan;

    function __construct()
    {
        $this->ruangan = new RuanganModel();
    }

    public function index()
    {
        $data['dataruangan'] = $this->ruangan->LihatRuangan();

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('admin/ruangan/index',$data);
        echo view('layout/footer');


    }

   

}