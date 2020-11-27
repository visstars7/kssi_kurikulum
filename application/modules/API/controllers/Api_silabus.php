<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_silabus extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_silabus');
    }

    public function silabuses()
    {
        if ($this->input->is_ajax_request() == TRUE) {

            $data = $this->M_silabus->get('v_silabus', 'db');
            echo json_encode($data);
        } else {
            redirect(base_url('Auth'));
        }
    }
};
