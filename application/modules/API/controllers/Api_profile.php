<?php

class Api_profile extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile');
        header("Access-Control-Allow-Origin:*");
    }

    public function get_profile()
    {

        $post = $this->input->post();
        if ($post['role'] == 'siswa') {
            $data = $this->M_profile->get_where('master', 'siswa', ['nisn' => $post['nisn']]);
        } else {
            $data = $this->M_profile->get_where('master', 'guru', ['nip' => $post['nip']]);
        }

        echo json_encode($data);
    }
};
