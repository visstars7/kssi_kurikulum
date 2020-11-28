<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Materi extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_materi');
        header("Access-Control-Allow-Origin:*");
    }

    public function get_where()
    {
        $post = $this->input->post();
        $json = $this->M_materi->get_where($post['db'], $post['tb'], ['id_kelas' => $post['kelas_id']]);
        if ($json) {
            echo json_encode($json);
        } else {
            echo json_encode(['status' => 404]);
        }
    }


    public function store()
    {
        $row = count($this->M_materi->get('db', 'tb_materi_pjj'));
        $post = $this->input->post();

        if ($post['tipe_file'] == 1) {
            $tipe = $_FILES['file']['type'];
            $post['id_materi_pjj'] = idgenerator($row, "MTR-");
            $post['file'] = checkpict($tipe, 'file', $_FILES, 'materi');
            $post['create_at'] = date('Y-m-d H:i:s');
            if ($this->M_materi->insert('db', 'tb_materi_pjj', $post)) {
                echo json_encode(['status' => 200]);
            } else {
                echo json_encode(['status' => 404]);
            }
        } else {
            $post['id_materi_pjj'] = idgenerator($row, "MTR-");
            $post['create_at'] = date('Y-m-d H:i:s');
            if ($this->M_materi->insert('db', 'tb_materi_pjj', $post)) {
                echo json_encode(['status' => 200]);
            } else {
                echo json_encode(['status' => 404]);
            }
        }
    }
};
