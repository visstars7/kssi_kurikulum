<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mapel');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'mapel'
        ];
        return view('Kurikulum.views.mapel', $data);
    }

    public function store()
    {
        $data = $this->input->post();
        $data['create_at'] = date('Y-m-d H:i:s');
        $this->M_mapel->insert('tb_mapel', $data);
    }

    public function get()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $data = $this->input->post();
            if (!empty($data['tb'])) {
                $json = $this->M_mapel->get($data['tb']);
                echo json_encode($json);
            }
        }
    }

    public function get_where()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $data = $this->input->post();
            if ($data['tipe'] == 'edit') {
                $json['mapel'] = $this->M_mapel->get_where($data['id']);
                $json['kurikulum'] = $this->M_mapel->get('tb_kurikulum');
                echo json_encode($json);
            } else {
                $json = $this->M_mapel->get_where($data['id']);
                echo json_encode($json);
            }
        }
    }

    public function delete($id)
    {
        $this->M_mapel->delete('tb_mapel', $id);
    }

    public function update()
    {
        $data = $this->input->post();
        $data['update_at'] = date('Y-m-d H:i:s');
        $this->M_mapel->update($data['id_mapel'], $data);
    }

    public function mapel_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_mapel->get_datatables('tb_mapel');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nama_mapel;
                $row[] = $field->kelompok;
                $row[] = $field->sub_kelompok;
                $row[] = $field->produktif;
                $row[] = $field->nama_kurikulum;
                $row[] = $field->tingkat;
                $row[] = "<button class=' btn btn-sm btn-success px-3' data-toggle='modal' data-target='#detail' onclick=detail('$field->id_mapel')><i class='fa fa-search-plus'></i></button>";
                $row[] = "<button class=' btn btn-sm btn-info px-3' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_mapel')><i class='fa fa-edit'></i></button>";
                $row[] = '<a href="' . base_url("Kurikulum/Mapel/delete/$field->id_mapel") . '"class="btn btn-danger btn-sm px-3"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_mapel->count_all(),
                "recordsFiltered" => $this->M_mapel->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
