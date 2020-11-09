<?php

class M_hari_pelajaran extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('db_kurikulum', TRUE);
    }
    private $_table = "tb_hari_pelajaran";

    public $master;
    public $id_hari;
    public $nama_hari;

    public function getAll()
    {
        return $this->master->get($this->_table)->result();
    }
};
