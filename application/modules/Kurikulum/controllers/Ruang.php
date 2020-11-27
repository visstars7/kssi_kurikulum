<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Ruang extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ruang');
        $this->load->helper('qrgenerate');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'ruang'
        ];
        return view('Kurikulum.views.ruang', $data);
    }

    private function _generateText($image, $font, $text, $x, $y)
    {
        $W_src = imagesx($image);
        $H_src = imagesy($image);
        imagecreatetruecolor($W_src, $H_src);
        $white = imagecolorallocate($image, 255, 255, 255);
        imagettftext($image, 30, 0, $x, $y, $white, $font, $text);
    }

    private function generateQr($srcImage, $qr, $qr_x, $qr_y)
    {
        // $qr_w = imagesx($qr);
        // $qr_h = imagesy($qr);
        // $img_w = imagesx($srcImage);
        // $img_h = imagesy($srcImage);

        imagecopyresampled($srcImage, $qr, 50, 335, 0, 0, 200, 200, 240, 240);
    }

    private function _generateImage($data)
    {
        header('Content-type:img/png');

        // get the image resource
        $QR = imagecreatefrompng($data['file']);
        $image = imagecreatefrompng(base_url('assets/img/qrclass.png'));

        // image with text class
        $font = FCPATH . 'assets/font/Roboto.ttf';
        $len = strlen($data['nama_ruang']);

        if ($len > 3) {
            $this->_generateText($image, $font, substr($data['nama_ruang'], 0, -$len / 2), 115, 100);
            $this->_generateText($image, $font, substr($data['nama_ruang'], 3), 100, 150);
        } else {
            $this->_generateText($image, $font, $data['nama_ruang'], 115, 100);
        }

        // draw QR on Template
        $this->generateQr($image, $QR, 100, 100);

        imagepng($image);
        imagedestroy($image);
    }

    public function download($id)
    {
        $data  = $this->M_ruang->get_where('tb_ruang', ['id_ruang' => $id]);
        $this->_generateImage($data[0]);
    }

    public function delete($id)
    {
        $this->M_ruang->delete('tb_ruang', 'id_ruang', $id);
    }

    public function store()
    {
        // get row
        $row = $this->M_ruang->num_rows('tb_ruang');

        // QR code generate
        $id = idgenerator($row, "RU-");
        $file = qrgenerate($id, 'ruang-qr', 'QR');

        $data = $this->input->post();
        $data['id_ruang'] = $id;
        $data['file'] = $file;
        $data['create_at'] = date('Y-m-d H:i:s');

        $this->M_ruang->insert('tb_ruang', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $json = $this->M_ruang->get_where('tb_ruang', ['id_ruang' => $id]);

        echo json_encode($json);
    }

    public function update()
    {
        $data = $this->input->post();
        $data['update_at'] = date('Y-m-d H:i:s');
        $this->M_ruang->update('id_ruang', $data['id_ruang'], 'tb_ruang', $data);
    }

    // Datatables
    public function ruang_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_ruang->get_datatables('tb_ruang');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nama_ruang;
                $row[] = "<img style='height:100px' src='" . base_url(substr($field->file, 33)) . "'>";
                $row[] = $field->create_at;
                $row[] = $field->update_at;
                // $row[] = $field->file;
                $row[] = '<a href="' . base_url("Kurikulum/Ruang/download/$field->id_ruang") . '" style="color:white" class="btn btn-warning btn-sm px-3"><i class="fa fa-download"></i></a>';
                $row[] = "<button class=' btn btn-sm btn-info px-3' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_ruang')><i class='fa fa-edit'></i></button>";
                $row[] = '<a href="' . base_url("Kurikulum/Ruang/delete/$field->id_ruang") . '"class="btn btn-danger btn-sm px-3"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_ruang->count_all(),
                "recordsFiltered" => $this->M_ruang->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_404();
        }
    }
};
