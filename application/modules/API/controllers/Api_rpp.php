<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_rpp extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rpp');
    }
};
