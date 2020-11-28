<?php

class Api_penyerahan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyerahan');
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

    private function _checkDeadline($post)
    {
        $where = ['id_materi_pjj' => $post['id_materi_pjj']];
        $materi = $this->M_penyerahan->get_where('db', 'v_materi_pjj', $where);
        $deadline = $materi[0]['waktu_penyerahan'];

        if ($post['create_at'] > $deadline) {
            return 1;
        } else {
            return 0;
        }
    }

    public function store()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $post = $this->input->post();
            $row = count($this->M_penyerahan->get('db', 'tb_penyerahan_pjj'));

            if ($post['tipe_penyerahan'] == 1) {

                $tipe = $_FILES['file']['type'];
                $post['id_penyerahan'] = idgenerator($row, 'JWB-');
                $post['create_at'] = date('Y-m-d H:i:s');
                $post['file'] = checkpict($tipe, 'file', $_FILES, 'penyerahan');
                $post['status'] = $this->_checkDeadline($post);
            } else {
                $post['id_penyerahan'] = idgenerator($row, 'JWB-');
                $post['create_at'] = date('Y-m-d H:i:s');
                $post['status'] = $this->_checkDeadline($post);
            }
            if ($this->M_penyerahan->insert('db', 'tb_penyerahan_pjj', $post)) {
                echo json_encode(['status' => 200]);
            } else {
                echo json_encode(['status' => 404]);
            }
        } else {
            echo json_encode(['status' => 404]);
        }
    }
};
