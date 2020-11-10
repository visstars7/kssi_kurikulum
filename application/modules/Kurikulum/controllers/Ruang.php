<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ruang');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'ruang'
        ];
        return view('Kurikulum.views.ruang', $data);
    }
};
