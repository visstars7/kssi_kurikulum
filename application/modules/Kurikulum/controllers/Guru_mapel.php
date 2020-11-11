<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_mapel extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru_mapel',);
    }

    public function index()
    {
        $data = [
            'activeSide' => 'guru_mapel'
        ];
        return view('Kurikulum.views.guru_mapel', $data);
    }

    public function get()
    {
        $data = $this->input->post();
        if ($this->input->is_ajax_request() == TRUE) {
            $json = $this->M_guru_mapel->get($data['db'], $data['tb']);
            echo json_encode($json);
        }
    }

    public function store()
    {
        $data = $this->input->post();
        $data['create_at'] = date('Y-m-d H:i:s');
        $this->M_guru_mapel->insert('tb_guru_mapel', $data);
    }

    public function get_where()
    {
        $data = $this->input->post();
        if ($this->input->is_ajax_request() == TRUE) {
            $json['guru_mapel'] = $this->M_guru_mapel->get_where('v_guru_mapel', ['id_guru_mapel' => $data['id']]);
            $json['mapel']  = $this->M_guru_mapel->get('db', 'tb_mapel');
            $json['guru'] = $this->M_guru_mapel->get('master', 'guru');
            echo json_encode($json);
        }
    }

    public function update()
    {
        $data = $this->input->post();
        $data['update_at'] = date('Y-m-d H:i:s');
        $this->M_guru_mapel->update('tb_guru_mapel', 'id_guru_mapel', $data['id_guru_mapel'], $data);
    }

    public function delete($id)
    {
        $this->M_guru_mapel->delete('tb_guru_mapel', 'id_guru_mapel', $id);
    }

    // Datatables
    public function guru_mapel_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_guru_mapel->get_datatables('v_guru_mapel');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nip;
                $row[] = $field->nama_guru;
                $row[] = $field->nama_mapel;
                $row[] = $field->create_at;
                $row[] = $field->update_at;
                $row[] = "<button class=' btn btn-sm btn-info px-3' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_guru_mapel')><i class='fa fa-edit'></i></button>";
                $row[] = '<a href="' . base_url("Kurikulum/Guru_mapel/delete/$field->id_guru_mapel") . '"class="btn btn-danger btn-sm px-3"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_guru_mapel->count_all(),
                "recordsFiltered" => $this->M_guru_mapel->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
