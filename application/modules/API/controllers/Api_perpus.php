<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_perpus extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpustakaan');
    }

    public function ebooks()
    {
        if ($this->input->is_ajax_request() == true) {
            $ebook = $this->M_perpustakaan->get('v_ebook', 'db');
            echo json_encode($ebook);
        } else {
            redirect(base_url('Auth'));
        }
    }
}
