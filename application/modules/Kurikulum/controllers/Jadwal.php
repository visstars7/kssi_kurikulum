<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jadwal');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'jadwal'
        ];
        return view('Kurikulum.views.jadwal', $data);
	}
};