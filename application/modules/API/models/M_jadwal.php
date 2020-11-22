<?php

class M_jadwal extends CI_model
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

    public function insert($tb, $data)
    {
        $this->db->insert($tb, $data);
    }

    public function reset($db, $tb)
    {
        return $this->$db->truncate($tb);
    }

    public function get_where($db, $tb, $where)
    {
        return $this->$db->get_where($tb, $where)->result_array();
    }

    public function update($db, $tb, $col, $id, $data)
    {
        $this->$db->where($col, $id);
        return $this->$db->update($tb, $data);
    }
}
