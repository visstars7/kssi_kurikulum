<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sesi_pelajaran extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sesi_pelajaran');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'sesi_pelajaran'
        ];
        return view('Kurikulum.views.sesi_pelajaran', $data);
	}
};