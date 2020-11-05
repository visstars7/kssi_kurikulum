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
            $list = $this->M_rpp_silabus->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = array();

                $row[] = $no;
                $row[] = $field->judul_buku;
                $row[] = $field->nama_kelas;
                $row[] = $field->semester;
                $row[] = $field->tingkat_kelas;
                $row[] = '<button onclick="detail(' . $field->id_ebook . ')" data-toggle="modal" data-target="#detail" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></button>';
                $row[] = '<button onclick="edit(' . $field->id_ebook . ')" data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>';
                $row[] = '<a href="Perpustakaan/delete/' . $field->id_ebook . '"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_ebook->count_all(),
                "recordsFiltered" => $this->M_ebook->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
};
