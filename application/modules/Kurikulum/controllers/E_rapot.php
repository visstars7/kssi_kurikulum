<?php
defined('BASEPATH') or exit('No direct script access allowed');

class E_rapot extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_e_rapot');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'e_rapot'
        ];
        return view('Kurikulum.views.e_rapot', $data);
	}
};