<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_materi');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'materi'
        ];
        return view('Kurikulum.views.materi', $data);
	}
};