<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jurnal');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'jurnal'
        ];
        return view('Kurikulum.views.jurnal', $data);
    }


    // Datatables
    public function jurnal_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_jurnal->get_datatables('v_jurnal');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row[] = $no;
                $row[] = $field->nama_guru;
                $row[] = $field->nama_mapel;
                $row[] = $field->kegiatan;
                $row[] = $field->nama_kelas;
                $row[] = $field->create_at;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_jurnal->count_all(),
                "recordsFiltered" => $this->M_jurnal->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
