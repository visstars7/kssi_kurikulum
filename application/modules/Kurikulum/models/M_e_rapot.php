<?php

class M_e_rapot extends CI_model
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

    public function get_where($db, $tb, $where, $type)
    {
        if ($type == 'rata-rata') {

            $kelas = $where['id_kelas'];
            $semester = $where['semester'];

            return $this->$db->query("SELECT * FROM $tb WHERE `id_kelas` = $kelas
            AND `semester` = $semester AND `jenis_uji` != 'PAS' AND `jenis_uji` != 'PTS'")->result_array();
        } elseif ($type == 'ujian') {

            $kelas = $where['id_kelas'];
            $semester = $where['semester'];

            return $this->$db->query("SELECT * FROM $tb WHERE `id_kelas` = $kelas
            AND `semester` = $semester AND `jenis_uji` = 'PAS' OR `jenis_uji` = 'PTS'")->result_array();
        } else {
            return $this->$db->get_where($tb, $where)->result_array();
        }
    }

    public function get_distinct($db, $tb, $id_kelas, $type)
    {
        if ($type == 'jenis_uji') {

            return $this->$db->query("SELECT COUNT(DISTINCT `$type`) FROM $tb WHERE `id_kelas` = $id_kelas")->result_array();
        } else {
            return $this->$db->query("SELECT DISTINCT `$type` FROM $tb WHERE `id_kelas` = $id_kelas")->result_array();
        }
    }
};
