<?php

class M_profile extends CI_Model
{
    private $master;
    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('db_master', TRUE);
    }

    public function get_where($db, $tb, $where)
    {
        return $this->$db->get_where($tb, $where)->result_array();
    }

    public function insert($tb, $data)
    {
        return $this->db->insert($tb, $data);
    }
};
