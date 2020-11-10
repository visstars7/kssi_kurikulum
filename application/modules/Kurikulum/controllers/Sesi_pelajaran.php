<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sesi_pelajaran extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sesi_pelajaran', 'M_sesi');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'sesi_pelajaran'
        ];
        return view('Kurikulum.views.sesi_pelajaran', $data);
    }

    public function get()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $tb = $this->input->post('tb');
            $json = $this->M_sesi->get($tb);
            echo json_encode($json);
        } else {
            show_404();
        }
    }

    public function get_where()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $data = $this->input->post();
            if ($data['tipe'] == 'detail') {
                $json = $this->M_sesi->get_where($data['tb'], [$data['col'] => $data['id']]);
            } else {
                $json = [];
                $json['sesi'] = $this->M_sesi->get_where($data['tb'], [$data['col'] => $data['id']]);
                $json['hari'] = $this->M_sesi->get('tb_hari_pelajaran');
            }
            echo json_encode($json);
        } else {
            show_404();
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $data = $this->input->post();
            $data['create_at'] = date('Y-m-d H:i:s');
            $this->M_sesi->insert('tb_sesi_pelajaran', $data);
        } else {
            show_404();
        }
    }

    public function delete($id)
    {
        $this->M_sesi->delete('tb_sesi_pelajaran', $id);
    }

    public function update()
    {
        $data = $this->input->post();
        if (!empty($data)) {
            $data['update_at'] = date('Y-m-d H:i:s');
            $this->M_sesi->update('tb_sesi_pelajaran', $data['id_sesi'], $data);
        } else {
            show_404();
        }
    }


    public function sesi_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_sesi->get_datatables('tb_sesi_pelajaran');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->sesi;
                $row[] = $field->nama_hari;
                $row[] = $field->waktu_mulai;
                $row[] = $field->waktu_selesai;
                $row[] = "<button class='btn-sm btn-success' data-toggle='modal' data-target='#detail' onclick=detail('$field->id_sesi')><i class='fa fa-search-plus'></i></button>";
                $row[] = "<button class='btn-sm btn-info' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_sesi')><i class='fa fa-edit'></i></button>";
                $row[] = '<a href="' . base_url("Kurikulum/Sesi_pelajaran/delete/$field->id_sesi") . '"class="btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_sesi->count_all(),
                "recordsFiltered" => $this->M_sesi->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
