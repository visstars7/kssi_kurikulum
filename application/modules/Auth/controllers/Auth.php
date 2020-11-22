<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('Auth.views.v_auth', $data);
    }

    public function check()
    {
        $post = $this->input->post();

        $where = [
            'username' => $post['username'],
            'password' => $post['password']
        ];

        $akun = $this->M_auth->get_where('master', 'akun', $where);


        if (!empty($akun)) {
            $where = [
                'akun_id' => $akun[0]['id']
            ];
            $data = $this->M_auth->get_where('master', 'akun_role', $where);
            $data['status'] = 200;
            $data['role'] = $akun;
            $data['guru'] = $this->M_auth->get_where('master', 'guru', ['nip' => $akun[0]['username']]);
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 404]);
        }
    }
};
