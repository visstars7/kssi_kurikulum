<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpustakaan');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'dashboard',
        ];
        return view('Perpustakaan.views.dashboard', $data);
    }

    public function e_book()
    {
        $data = [
            'activeSide' => 'e_book',
        ];
        return view('Perpustakaan.views.e_book', $data);
    }
}
