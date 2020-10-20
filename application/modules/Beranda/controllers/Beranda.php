<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('Beranda.views.v_beranda', $data);
    }
};
