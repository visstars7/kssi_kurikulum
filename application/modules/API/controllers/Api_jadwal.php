<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_jadwal extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jadwal');
        $this->load->library('Pdf');
    }

    public function schedules()
    {
        if ($this->input->is_ajax_request() == true) {
            $kelas = $this->input->post('nama_kelas');
            $tingkat = $this->input->post('tingkat');
            $where = [
                'id_kelas' => $kelas,
                'tingkat_kelas' => $tingkat
            ];
            $result = $this->M_jadwal->get_where('db', 'v_jadwal', $where);
            if (!empty($result)) {

                $data = [
                    'kelas' => $result[0]['nama_kelas'],
                    'result' => $result
                ];

                header('Content-Type:application/pdf');
                $this->pdf->setPaper('A2', 'potrait');
                $this->pdf->filename = encode($kelas) . ".pdf";
                $this->pdf->load_view('v_table_jadwal', $data);
            }
        } else {
            redirect(base_url('Auth'));
        }
    }
}
