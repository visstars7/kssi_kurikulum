<?php

class M_daftar_nilai extends CI_model
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
        return $this->$db->get_where($tb, $where)->result_array();
    }

    public function insert_batch($tb, $data)
    {
        return $this->db->insert_batch($tb, $data);
    }


    var $table; //nama tabel dari database
    var $column_order = array(null, null, null, null, null, null, null, null); //Sesuaikan dengan field
    var $column_search = array('nama_guru', 'nama_siswa', 'nip', 'nisn', 'nama_kelas'); //field yang diizin untuk pencarian 
    var $order = array("create_at" => 'DESC'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($tb)
    {
        $this->table = $tb;
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
};
