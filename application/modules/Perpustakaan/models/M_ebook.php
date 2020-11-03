<?php
class M_ebook extends CI_Model
{
    private $master;

    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('db_master', TRUE);
    }

    public function insert($table, $data)
    {
        if ($this->db->insert($table, $data)) {
            redirect(base_url('e-book'));
        }
    }

    public function delete($table, $data)
    {
        if ($this->db->delete($table, $data)) {
            redirect(base_url('e-book'));
        }
    }

    public function update($table, $data, $id, $column)
    {
        $this->db->where($column, $id);
        if ($this->db->update($table, $data)) {
            redirect(base_url('e-book'));
        } else {
            show_error("Tidak dapat update", 500, "Kesalahan models");
        }
    }

    public function get_where($table, $data)
    {
        return $this->db->get_where($table, $data)->result_array();
    }

    public function get_multi_db($table, $database)
    {
        return $this->$database->get($table)->result_array();
    }

    var $table = 'v_ebook'; //nama tabel dari database
    var $column_order = array(null, null, null, 'semester', null, null, null); //Sesuaikan dengan field
    var $column_search = array('judul_buku', 'nama_mapel', 'nama_kelas', 'semester'); //field yang diizin untuk pencarian 
    var $order = array('nama_kelas' => 'DESC'); // default order 

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

    function get_datatables()
    {
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
}
