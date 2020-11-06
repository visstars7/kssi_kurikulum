<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rpp extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rpp_silabus');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'rpp'
        ];
        return view('Kurikulum.views.rpp', $data);
    }

    public function rpp_datatables()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_rpp_silabus->get_datatables('v_rpp');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nip;
                $row[] = $field->guru;
                $row[] = $field->nama_mapel;
                $row[] = $field->tingkat_kelas;
                $row[] = $field->semester;
                $row[] = $field->create_at;
                $row[] = $field->update_at;
                $row[] = "<button class='btn-sm btn-success' data-toggle='modal' data-target='#show' onclick=show('$field->id_rpp')><i class='fa fa-search-plus'></i></button>";
                $row[] = "<button class='btn-sm btn-info' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_rpp')><i class='fa fa-edit'></i></button>";
                $row[] = '<a href="' . base_url("Kurikulum/Rpp/delete/$field->id_rpp") . '"class="btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_rpp_silabus->count_all(),
                "recordsFiltered" => $this->M_rpp_silabus->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function get_data()
    {
        if ($this->input->is_ajax_request() == TRUE) {

            $tb = $this->input->post('tb');
            $db = $this->input->post('db');
            $id = $this->input->post('id');
            $col = $this->input->post('column');

            if (!isset($id)) {
                $json = $this->M_rpp_silabus->get($db, $tb);
                echo json_encode($json);
            } else {
                $json = $this->M_rpp_silabus->get_where($db, $tb, [$col => $id]);
                echo json_encode($json);
            }
        }
    }

    public function edit_data()
    {
        if ($this->input->is_ajax_request() == TRUE) {

            $id = $this->input->post('id');
            $data = [
                'guru' => $this->M_rpp_silabus->get('master', 'guru'),
                'mapel' => $this->M_rpp_silabus->get('db', 'tb_mapel'),
                'rpp' => $this->M_rpp_silabus->get_where('db', 'v_rpp', ['id_rpp' => $id]),
            ];

            echo json_encode($data);
        } else {
            redirect(base_url('Auth'));
        }
    }

    public function update()
    {
        if (empty($_FILES['file-rpp-update']['name'])) {
            $data = $this->input->post();
            $id = $this->input->post('id_rpp');
            unset($data['id_rpp']);
            $data['update_at'] = date('Y-m-d H:i:s');
            $this->M_rpp_silabus->update('tb_rpp', 'id_rpp', $id, $data, 'rpp');
        } else {
            $data = $this->input->post();
            $id = $this->input->post('id_rpp');
            unset($data['id_rpp']);
            $data['update_at'] = date('Y-m-d H:i:s');
            $data['file'] = checkpict('application/pdf', 'file-rpp-update', $_FILES, 'rpp');
            $this->M_rpp_silabus->update('tb_rpp', 'id_rpp', $id, $data, 'rpp');
        }
    }

    public function delete($id)
    {
        $this->M_rpp_silabus->delete('tb_rpp', ['id_rpp' => $id], 'rpp');
    }

    public function store()
    {
        $row = count($this->M_rpp_silabus->get('db', 'tb_rpp'));

        $data = [
            'id_rpp' => idgenerator($row, "RPP-"),
            'id_mapel' => $this->input->post('mapel'),
            'file' => checkpict('application/pdf', 'file_rpp', $_FILES, 'rpp'),
            'nip' => $this->input->post('guru'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'semester' => $this->input->post('semester'),
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $this->M_rpp_silabus->insert('tb_rpp', $data, 'rpp');
    }
};
