<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_guru extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_absensi_guru');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'absensi_guru'
        ];
        return view('Kurikulum.views.absensi_guru', $data);
	}
};