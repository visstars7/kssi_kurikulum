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
        $data['id_hari'] = $this->M_hari_pelajaran->getAll();
        $data = [
            'activeSide' => 'hari_pelajaran',
            'id_hari' => $this->M_hari_pelajaran->getAll()
        ];
        return view('Kurikulum.views.hari_pelajaran', $data);
    }
};
