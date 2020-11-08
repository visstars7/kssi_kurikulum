<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_mapel extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru_mapel');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'guru_mapel'
        ];
        return view('Kurikulum.views.guru_mapel', $data);
	}
};