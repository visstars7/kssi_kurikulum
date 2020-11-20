<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class E_rapot extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_e_rapot');
    }

    public function index()
    {
        $data = [
            'activeSide' => 'e_rapot'
        ];
        return view('Kurikulum.views.e_rapot', $data);
    }

    public function get()
    {
        if ($this->input->is_ajax_request() == true) {
            $post = $this->input->post();
            $data = $this->M_e_rapot->get($post['db'], $post['tb']);
            echo json_encode($data);
        } else {
            redirect(base_url('Kurikulum/e-rapot'));
        }
    }

    private function _toExcel($data, $ujian, $data_uji, $kelas)
    {
        $data_uji = $data_uji[0]['COUNT(DISTINCT `jenis_uji`)'] - 2;

        // nilai tugas harian
        for ($i = 0; $i < count($data); $i++) {
            if (isset($data[$i + 1]['nilai'])) {
                $j = $i + 1;
            }
            $temp_nilai[] = $data[$i]['nilai'] + $data[$j]['nilai'];
            $i++;
        }

        for ($i = 0; $i < count($temp_nilai); $i++) {
            $nilai = ($temp_nilai[$i] / $data_uji);
            $avg[] = round((60 / 100) * $nilai);
        }

        // PTS && PAS
        for ($i = 0; $i < count($ujian); $i++) {
            if ($ujian[$i]['jenis_uji'] == 'PAS') {
                $PAS[] = round((20 / 100) * $ujian[$i]['nilai']);
            } else {
                $PTS[] = round((20 / 100) * $ujian[$i]['nilai']);
            }
        }

        // total rapot
        for ($i = 0; $i < count($PAS); $i++) {
            $rapot[] = ($avg[$i] + $PAS[$i] + $PTS[$i]);
        }

        $arr = ['D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama Kelas');
        $sheet->setCellValue('A2', 'Semester');

        $sheet->setCellValue('B1', $data[0]['nama_kelas']);
        $sheet->setCellValue('B2', $data[0]['semester']);

        $sheet->setCellValue('A6', 'No');
        $sheet->setCellValue('B6', 'NISN');
        $sheet->setCellValue('C6', 'Nama Siswa');

        $sheet->setCellValue("D6", 'Rapot');

        $noSheet = 7;

        for ($i = 0; $i < count($kelas); $i++) {
            $sheet->setCellValue("A$noSheet", $i + 1);
            $sheet->setCellValue("B$noSheet", $kelas[$i]['nisn']);
            $sheet->setCellValue("C$noSheet", $kelas[$i]['nama']);
            $sheet->setCellValue("D$noSheet", $rapot[$i]);
            $noSheet++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = $data[0]['nama_kelas'];

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . 'Rapot-' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }


    public function store()
    {
        $post = $this->input->post();
        $where = [
            'id_kelas' => $post['kelas'],
            'semester' => $post['semester']
        ];

        $data = $this->M_e_rapot->get_where($post['db'], $post['tb'], $where, 'rata-rata');
        $ujian = $this->M_e_rapot->get_where($post['db'], $post['tb'], $where, 'ujian');
        $data_uji = $this->M_e_rapot->get_distinct($post['db'], $post['tb'], $post['kelas'], 'jenis_uji');
        $kelas = $this->M_e_rapot->get_where('master', 'siswa', ['kelas_id' => $post['kelas']], 'kelas');

        if ($data && $ujian) {

            $d = new DateTime($data[0]['create_at']);
            $y = $d->format('Y');

            if (!empty($data[0]) && $y == $post['tahun_ajaran']) {
                $this->_toExcel($data, $ujian, $data_uji, $kelas);
            } else {
                echo json_encode(['error' => 'Data tidak ditemukan']);
            }
        } else {
            echo json_encode(['error' => 'Data tidak ditemukan']);
        }
    }
};
