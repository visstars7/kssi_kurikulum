<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyerahan_materi extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyerahan_materi');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'penyerahan_materi'
        ];
        return view('Kurikulum.views.penyerahan_materi', $data);
	}
};