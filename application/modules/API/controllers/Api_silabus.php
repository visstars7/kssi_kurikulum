<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_silabus extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_silabus');
    }
};
