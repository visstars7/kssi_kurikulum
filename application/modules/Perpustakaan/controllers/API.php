<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpustakaan');
        $this->load->model('M_ebook');
    }

    public function ebooks()
    {
        if ($this->input->is_ajax_request() == true) {
            $ebook = $this->M_perpustakaan->get('v_ebook', 'db');
            echo json_encode($ebook);
        } else {
            echo "You're not promitted use this";
        }
    }
}
