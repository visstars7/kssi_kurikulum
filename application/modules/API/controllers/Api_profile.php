<?php

class Api_profile extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile');
    }

    public function get_profile()
    {
        if ($this->input->is_ajax_request() == true) {

            $post = $this->input->post();
            if ($post['role'] == 'siswa') {
                $data = $this->M_profile->get_where('master', 'siswa', ['nisn' => $post['nisn']]);
            } else {
                $data = $this->M_profile->get_where('master', 'guru', ['nip' => $post['nip']]);
            }

            echo json_encode($data);
        } else {
            echo json_encode(['status' => 404]);
        }
    }
};
