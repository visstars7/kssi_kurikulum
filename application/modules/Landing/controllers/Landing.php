<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Landing'
        ];
        $this->load->view('v_landing');
    }
};
