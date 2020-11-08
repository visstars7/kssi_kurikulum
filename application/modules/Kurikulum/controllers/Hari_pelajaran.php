<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hari_pelajaran extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_hari_pelajaran');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'hari_pelajaran'
        ];
        return view('Kurikulum.views.hari_pelajaran', $data);
	}
};