<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hari_pelajaran extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_hari_pelajaran', 'M_hari');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'hari_pelajaran'
        ];
        return view('Kurikulum.views.hari_pelajaran', $data);
    }

    public function store()
    {
        $data = $this->input->post();
        $data['create_at'] = date('Y-m-d H:i:s');
        $this->M_hari->insert('tb_hari_pelajaran', $data);
    }

    public function get_where()
    {
        $id = $this->input->post('id');
        $json = $this->M_hari->get_where('tb_hari_pelajaran', ['id_hari' => $id]);

        echo json_encode($json);
    }


    public function update()
    {
        $data = $this->input->post();
        $data['update_at'] = date('Y-m-d H:i:s');
        $this->M_hari->update('tb_hari_pelajaran', 'id_hari', $data['id_hari'], $data);
    }

    public function delete($id)
    {
        $this->M_hari->delete('tb_hari_pelajaran', 'id_hari', $id);
    }


    // Datatables
    public function hari_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_hari->get_datatables('tb_hari_pelajaran');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nama_hari;
                $row[] = $field->create_at;
                $row[] = $field->update_at;
                $row[] = "<button class=' btn btn-sm btn-info px-3' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_hari')><i class='fa fa-edit'></i></button>";
                $row[] = '<a href="' . base_url("Kurikulum/Hari_pelajaran/delete/$field->id_hari") . '"class="btn btn-danger btn-sm px-3"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_hari->count_all(),
                "recordsFiltered" => $this->M_hari->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
