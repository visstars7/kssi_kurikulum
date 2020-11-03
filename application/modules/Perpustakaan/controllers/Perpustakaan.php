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

    public function store()
    {
        $pict_name = checkpict('application/pdf', 'file_buku', $_FILES);
        if ($pict_name !== 0) {

            $data = [
                'id_mapel' => $this->input->post('mapel'),
                'id_kelas' => $this->input->post('kelas'),
                'judul_buku' => $this->input->post('judul_buku'),
                'semester' => $this->input->post('semester'),
                'tingkat_kelas' => $this->input->post('tingkat_kelas'),
                'create_at' => date('Y-m-d H:i:s'),
                'file' => $pict_name
            ];

            $this->M_ebook->insert('tb_ebook', $data);
        } else {
            echo 'error datatype of yours file';
            die;
        }
    }

    public function delete($id)
    {
        $data = [
            'id_ebook' => $id
        ];
        $this->M_ebook->delete('tb_ebook', $data);
    }

    public function get_edit()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id_ebook');
            $data = [
                'ebook' => $this->M_ebook->get_where('v_ebook', ['id_ebook' => $id]),
                'kelas' => $this->M_ebook->get_multi_db('kelas', 'master'),
                'mapel' => $this->M_ebook->get_multi_db('tb_mapel', 'db'),
            ];

            echo json_encode($data);
        } else {
            echo 'not an ajax requests';
        }
    }

    public function update()
    {
        if (!empty($_FILES)) {
            $data = [
                'id_mapel' => $this->input->post('mapel'),
                'id_kelas' => $this->input->post('kelas'),
                'judul_buku' => $this->input->post('judul_buku'),
                'semester' => $this->input->post('semester'),
                'tingkat_kelas' => $this->input->post('tingkat_kelas'),
                'update_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $pict_name = checkpict('application/pdf', 'file_buku', $_FILES);
            if ($pict_name !== 0) {

                $data = [
                    'id_mapel' => $this->input->post('mapel'),
                    'id_kelas' => $this->input->post('kelas'),
                    'judul_buku' => $this->input->post('judul_buku'),
                    'semester' => $this->input->post('semester'),
                    'tingkat_kelas' => $this->input->post('tingkat_kelas'),
                    'file' => $pict_name,
                    'update_at' => date('Y-m-d H:i:s')
                ];
            } else {
                echo 'error datatype';
            }
        }
        $this->M_ebook->update('tb_ebook', $data, $this->input->post('id_ebook'), 'id_ebook');
    }


    public function e_book()
    {
        $data = [
            'activeSide' => 'e_book',
            'kelas' => $this->M_perpustakaan->get('kelas', 'master'),
            'mapel' => $this->M_perpustakaan->get('tb_mapel', 'db')
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
}
