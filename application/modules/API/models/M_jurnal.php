<?php

class M_jurnal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_where($tb, $where)
    {
        return $this->db->get_where($tb, $where);
    }

    public function insert($tb, $data)
    {
        return $this->db->insert($tb, $data);
    }
};
