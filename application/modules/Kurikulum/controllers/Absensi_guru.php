<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_guru extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_absensi_guru');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'absensi_guru'
        ];
        return view('Kurikulum.views.absensi_guru', $data);
    }


    // Datatables
    public function absensi_guru_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_absensi_guru->get_datatables('tb_absensi_kbm_guru');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                switch ($field->status) {
                    case 1:
                        $status = 'hadir';
                        break;
                    case 2:
                        $status = 'izin';
                        break;
                    default:
                        $status = 'tidak hadir';
                        break;
                }

                $no++;
                $row[] = $no;
                $row[] = $field->nip;
                $row[] = $field->id_kelas;
                $row[] = $field->id_ruang;
                $row[] = $field->waktu_masuk;
                $row[] = $field->waktu_keluar;
                $row[] = $status;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_absensi_guru->count_all(),
                "recordsFiltered" => $this->M_absensi_guru->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
