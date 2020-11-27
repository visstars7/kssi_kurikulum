<?php

class M_silabus extends CI_Model
{
    private $master;

    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('db_master', TRUE);
    }
    public function get($table, $database)
    {
        return $this->$database->get($table)->result_array();
    }
};
