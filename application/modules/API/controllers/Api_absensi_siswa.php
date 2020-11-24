<?php

class Api_absensi_siswa extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api_absensi');
    }



    public function get()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            // nip
            $post = $this->input->post();

            $sesi_ke = $this->M_api_absensi->get_sesi()['id_sesi'];
            $id_guru_mapel = $this->M_api_absensi->get_where('db', 'tb_guru_mapel', ['nip' => $post['nip']])['id_guru_mapel'];
            $id_kelas = $this->M_api_absensi->get_kelas($sesi_ke, $id_guru_mapel)['id_kelas'];

            $siswa = $this->M_api_absensi->get_where1('master', 'siswa', ['kelas_id' => $id_kelas]);
            echo json_encode($siswa);
        } else {
            echo json_encode(['status' => 404]);
        }
    }

    public function store()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            // nip
            $post = $this->input->post();

            $post['sesi_ke'] = $this->M_api_absensi->get_sesi()['id_sesi'];
            $post['id_guru_mapel'] = $this->M_api_absensi->get_where('db', 'tb_guru_mapel', ['nip' => $post['nip']])['id_guru_mapel'];
            $post['id_kelas'] = $this->M_api_absensi->get_kelas($post['sesi_ke'], $post['id_guru_mapel'])['id_kelas'];
            $post['create_at'] = date('Y-m-d H:i:s');

            if ($this->M_api_absensi->insert('db', 'tb_absensi_kbm_siswa')) {
                echo json_encode(['status' => 200]);
            } else {
                echo json_encode(['status' => 404]);
            }
        } else {
            echo json_encode(['status' => 404]);
        }
    }
};
