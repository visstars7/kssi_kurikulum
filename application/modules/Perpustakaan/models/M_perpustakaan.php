<?php

class M_perpustakaan extends CI_Model
{
    private $master;

    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('db_master', TRUE);
    }
};
