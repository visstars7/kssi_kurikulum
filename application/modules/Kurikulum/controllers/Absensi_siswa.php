<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_siswa extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_absensi_siswa');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'absensi_siswa'
        ];
        return view('Kurikulum.views.absensi_siswa', $data);
	}
};