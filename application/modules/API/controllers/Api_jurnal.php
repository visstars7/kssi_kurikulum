<?php

class Api_jurnal extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jurnal');
    }

    public function store()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $post = $this->input->post();
            $post['tanda_tangan'] = checkpict('image/jpeg', 'tanda_tangan', $_FILES, 'signature');
            $post['create_at'] = date('Y-m-d H:i:s');
            $post['id_mapel'] = $this->M_jurnal->get_where('tb_guru_mapel', ['id_guru_mapel' => $post['id_guru_mapel']])->row_array()['id_mapel'];
            unset($post['id_guru_mapel']);

            if ($this->M_jurnal->insert('tb_jurnal', $post)) {
                echo json_encode(['status' => 200]);
            } else {
                echo json_encode(['status' => 500]);
            }
        } else {
            echo json_encode(['status' => 404]);
        }
    }
};
