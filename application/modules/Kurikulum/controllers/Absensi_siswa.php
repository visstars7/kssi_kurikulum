<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_siswa extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_absensi_siswa');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'absensi_siswa'
        ];
        return view('Kurikulum.views.absensi_siswa', $data);
    }

    // Datatables
    public function Datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_absensi_siswa->get_datatables('tb_absensi_kbm_siswa');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                switch ($field->status_kehadiran) {
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
                $row[] = $field->nisn;
                $row[] = $field->id_kelas;
                $row[] = $field->id_ruang;
                $row[] = $field->sesi_ke;
                $row[] = $field->status_kehadiran;
                $row[] = $status;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_absensi_siswa->count_all(),
                "recordsFiltered" => $this->M_absensi_siswa->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
