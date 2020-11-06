<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jurnal');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'jurnal'
        ];
        return view('Kurikulum.views.jurnal', $data);
	}
};