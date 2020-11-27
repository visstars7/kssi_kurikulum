<?php

class M_materi extends CI_model
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

    public function insert($db, $tb, $data)
    {
        return $this->$db->insert($tb, $data);
    }
};
