<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('layout/content');
        echo view('layout/footer');
    }
}
