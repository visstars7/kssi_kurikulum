<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mapel');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'mapel'
        ];
        return view('Kurikulum.views.mapel', $data);
    }
};
