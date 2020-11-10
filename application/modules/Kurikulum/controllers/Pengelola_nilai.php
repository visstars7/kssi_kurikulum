<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola_nilai extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengelola_nilai');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'pengelola_nilai'
        ];
        return view('Kurikulum.views.pengelola_nilai', $data);
	}
};