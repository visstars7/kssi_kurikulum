<?php

class M_mapel extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($tb, $data)
    {
        if ($this->db->insert($tb, $data)) {
            redirect(base_url('Kurikulum/mapel'));
        } else {
            show_error(500, 'Kesalahan saat menambahkan data');
        }
    }

    public function get($tb)
    {
        return $this->db->get($tb)->result_array();
    }

    public function get_where($id)
    {
        $this->db->select('tb_mapel.*,tb_kurikulum.nama_kurikulum,tb_kurikulum.id_kurikulum');
        $this->db->join('tb_kurikulum', 'tb_mapel.id_kurikulum = tb_kurikulum.id_kurikulum');
        return $this->db->get_where('tb_mapel', ['id_mapel' => $id])->result_array();
    }

    public function delete($tb, $id)
    {
        $this->db->where('id_mapel', $id);
        if ($this->db->delete($tb)) {
            redirect(base_url('Kurikulum/mapel'));
        } else {
            show_error('error', 500, 'Error menghapus data');
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id_mapel', $id);
        if ($this->db->update('tb_mapel', $data)) {
            redirect(base_url('Kurikulum/Mapel'));
        }
    }

    // datatables
    var $table; //nama tabel dari database
    var $column_order = array(null, null, 'kelompok', 'sub_kelompok', 'produktif', 'tingkat', null, null, null, null); //Sesuaikan dengan field
    var $column_search = array('nama_kurikulum', 'kelompok', 'sub_kelompok', 'tingkat', 'nama_mapel'); //field yang diizin untuk pencarian 
    var $order = array("tb_mapel.create_at" => 'DESC'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->join('tb_kurikulum', "tb_mapel.id_kurikulum=$this->table.id_kurikulum");

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
