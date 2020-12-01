<?php

class Api_absensi_guru extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api_absensi');
        header("Access-Control-Allow-Origin:*");
    }

    public function store()
    {
        // id_ruang,nip,status
        $post = $this->input->post();
        // absen masuk
        if ($post['jenis_absensi'] == 1) {

            unset($post['jenis_absensi']);

            $post['sesi_masuk'] = $this->M_api_absensi->get_sesi()['id_sesi'];
            $post['id_guru_mapel'] = $this->M_api_absensi->get_where('db', 'tb_guru_mapel', ['nip' => $post['nip']])['id_guru_mapel'];
            $post['id_kelas'] = $this->M_api_absensi->get_kelas($post['sesi_masuk'], $post['id_guru_mapel'])['id_kelas'];
            $post['waktu_masuk'] =  date('Y-m-d H:i:s');
            $post['create_at'] = date('Y-m-d H:i:s');
            // absen keluar
        } elseif ($post['jenis_absensi'] == 2) {
            unset($post['jenis_absensi']);

            $post['sesi_keluar'] = $this->M_api_absensi->get_sesi()['id_sesi'];
            $post['id_guru_mapel'] = $this->M_api_absensi->get_where('db', 'tb_guru_mapel', ['nip' => $post['nip']])['id_guru_mapel'];
            $post['id_kelas'] = $this->M_api_absensi->get_kelas($post['sesi_keluar'], $post['id_guru_mapel'])['id_kelas'];
            $post['waktu_keluar'] = date('Y-m-d H:i:s');
            $post['create_at'] = date('Y-m-d H:i:s');
        }

        // var_dump($post);
        // die;

        if ($this->M_api_absensi->insert('db', 'tb_absensi_kbm_guru', $post)) {
            echo json_encode(['status' => 200]);
        } else {
            echo json_encode(['status' => 500]);
        }
    }
};
