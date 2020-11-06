<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_nilai extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_daftar_nilai');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'daftar_nilai'
        ];
        return view('Kurikulum.views.daftar_nilai', $data);
	}
};