<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyerahan_materi extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyerahan_materi');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'penyerahan_materi'
        ];
        return view('Kurikulum.views.penyerahan_materi', $data);
    }

    // Datatables
    public function materi_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_penyerahan_materi->get_datatables('v_penyerahan_pjj');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                switch ($field->status) {
                    case 1:
                        $status = 'Terlambat';
                        break;

                    default:
                        $status = 'Tepat Waktu';
                        break;
                }

                $row[] = $no;
                $row[] = $field->nama_siswa;
                $row[] = $field->nama_kelas;
                $row[] = $field->id_materi_pjj;
                $row[] = $field->waktu_penyerahan;
                $row[] = $field->create_at;
                $row[] = $status;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_penyerahan_materi->count_all(),
                "recordsFiltered" => $this->M_penyerahan_materi->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
