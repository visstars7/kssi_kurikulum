<?php

class M_api_absensi extends CI_Model
{
    private $master;
    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('db_master', TRUE);
    }

    public function get($db, $tb)
    {
        return $this->$db->get($tb)->result_array();
    }

    public function get_where($db, $tb, $where)
    {
        return $this->$db->get_where($tb, $where)->row_array();
    }

    public function get_where1($db, $tb, $where)
    {
        return $this->$db->get_where($tb, $where)->result_array();
    }


    public function get_sesi()
    {
        $min = '07:00';

        $max = date('H:i');

        return $this->db->query("SELECT * FROM `tb_sesi_pelajaran` WHERE `waktu_mulai` BETWEEN '$min' AND '$max' ORDER BY `waktu_selesai` DESC LIMIT 1")->row_array();
    }

    public function get_kelas($id_sesi, $id_guru_mapel)
    {
        return $this->db->query("SELECT * FROM `tb_jadwal` WHERE `id_sesi` = $id_sesi AND `id_guru_mapel` = $id_guru_mapel LIMIT 1")->row_array();
    }

    public function insert($db, $tb, $data)
    {
        return $this->$db->insert($tb, $data);
    }
};
