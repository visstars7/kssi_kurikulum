<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_materi');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'materi'
        ];
        return view('Kurikulum.views.materi', $data);
    }

    public function get()
    {
        $post = $this->input->post();
        $json = $this->M_materi->get($post['db'], $post['tb']);
        if ($json) {
            echo json_encode($json);
        } else {
            echo json_encode(['status' => 404]);
        }
    }

    public function store()
    {
        $row = count($this->M_materi->get('db', 'tb_materi_pjj'));
        $post = $this->input->post();

        if ($post['tipe_file'] == 1) {
            $tipe = $_FILES['file']['type'];
            $post['id_materi_pjj'] = idgenerator($row, "MTR-");
            $post['file'] = checkpict($tipe, 'file', $_FILES, 'materi');
            $post['create_at'] = date('Y-m-d H:i:s');
            if ($this->M_materi->insert('db', 'tb_materi_pjj', $post)) {
                redirect(base_url('Kurikulum/Materi'));
            } else {
                redirect(base_url('Kurikulum/Materi'));
            }
        } else {
            $post['id_materi_pjj'] = idgenerator($row, "MTR-");
            $post['create_at'] = date('Y-m-d H:i:s');
            if ($this->M_materi->insert('db', 'tb_materi_pjj', $post)) {
                redirect(base_url('Kurikulum/Materi'));
            } else {
                redirect(base_url('Kurikulum/Materi'));
            }
        }
    }

    // Datatables
    public function materi_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_materi->get_datatables('v_materi_pjj');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nama_mapel;
                $row[] = $field->nama_guru;
                $row[] = $field->nama_kelas;
                $row[] = $field->id_materi_pjj;
                $row[] = $field->waktu_penyerahan;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_materi->count_all(),
                "recordsFiltered" => $this->M_materi->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
