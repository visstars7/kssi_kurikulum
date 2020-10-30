<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpustakaan');
        $this->load->model('M_ebook');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'dashboard',
        ];
        return view('Perpustakaan.views.dashboard', $data);
    }

    public function e_book()
    {
        $data = [
            'activeSide' => 'e_book',
        ];
        return view('Perpustakaan.views.e_book', $data);
    }

    public function ebook_datatable()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_ebook->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                $row[] = $no;
                $row[] = 'judul_buku';
                $row[] = 'nama_kelas';
                $row[] = 'semester';
                $row[] = 'semester';
                $row[] = '<button class="btn btn-success btn-sm><i class="fas fa-search-plus"></i></button>';
                $row[] = '<button class="btn btn-info btn-sm><i class="fas fa-edit"></i></button>';
                $row[] = '<button class="btn btn-danger btn-sm><i class="fas fa-trash"></i></button>';
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
}
