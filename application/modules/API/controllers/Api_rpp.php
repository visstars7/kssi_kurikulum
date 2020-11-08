<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_rpp extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rpp');
    }

    public function rpps()
    {
        if ($this->input->is_ajax_request() == TRUE) {

            $data = $this->M_rpp->get('v_rpp', 'db');
            echo json_encode($data);
        } else {
            redirect(base_url('Auth'));
        }
    }
};
