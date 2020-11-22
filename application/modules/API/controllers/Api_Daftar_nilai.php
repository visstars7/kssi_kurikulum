<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Daftar_nilai extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_daftar_nilai');
    }

    public function get()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $data = $this->input->post();
            $json = $this->M_daftar_nilai->get($data['db'], $data['tb']);
            echo json_encode($json);
        } else {
            show_error('Is not an ajax requests', 500);
        }
    }

    private function _toExcel($data)
    {
        $arr = ['D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Kelas');
        $sheet->setCellValue('A2', 'Guru');
        $sheet->setCellValue('A3', 'Mapel');
        $sheet->setCellValue('A4', 'Semester');
        $sheet->setCellValue('B1', $data['kelas'][0]['nama']);
        $sheet->setCellValue('B2', $data['guru_mapel'][0]['nama_guru']);
        $sheet->setCellValue('B3', $data['guru_mapel'][0]['nama_mapel']);
        $sheet->setCellValue('B4', $data['semester']);
        $sheet->setCellValue('C1', $data['kelas'][0]['id']);
        $sheet->setCellValue('C2', $data['guru_mapel'][0]['id_guru_mapel']);

        $no = 1;
        $noSheet = 7;

        $sheet->setCellValue('A6', 'No');
        $sheet->setCellValue('B6', 'NIP');
        $sheet->setCellValue('C6', 'Nama Siswa');

        for ($i = 1; $i <= count($data['jenis_uji']); $i++) {
            $j = $i - 1;
            $sheet->setCellValue("$arr[$j]6", $data['jenis_uji'][$j]);
        }

        foreach ($data['siswa'] as $field) {
            $sheet->setCellValue("A$noSheet", $no);
            $sheet->setCellValue("B$noSheet", $field['nisn']);
            $sheet->setCellValue("C$noSheet", $field['nama']);
            $no++;
            $noSheet++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = $data['kelas'][0]['nama'];

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function templates()
    {
        $post = $this->input->post();;
        $data = [
            'siswa' => $this->M_daftar_nilai->get_where('master', 'siswa', ['kelas_id' => $post['id_kelas']]),
            'jenis_uji' => $post['jenis_uji'],
            'kelas' => $this->M_daftar_nilai->get_where('master', 'kelas', ['id' => $post['id_kelas']]),
            'guru_mapel' => $this->M_daftar_nilai->get_where('db', 'v_guru_mapel', ['id_guru_mapel' => $post['id_guru_mapel']]),
            'semester' => $post['semester']
        ];
        $this->_toExcel($data);
    }

    private function _readExcel($post)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($post['tmp_name']);

        $activeSheet = $spreadsheet->getActiveSheet()->toArray();

        return $activeSheet;
    }

    public function import()
    {
        $post = $_FILES['nilai_siswa'];

        $result = $this->_readExcel($post);
        $row = [];
        for ($i = 6; $i < count($result); $i++) {
            for ($j = 3; $j < count($result[5]); $j++) {
                $data = [
                    'nisn'  => $result[$i][1],
                    'id_guru_mapel' => $result[1][2],
                    'id_kelas' => $result[0][2],
                    'jenis_uji' => $result[5][$j],
                    'nilai' => $result[$i][$j],
                    'semester' => $result[3][1],
                    'create_at' => date('Y-m-d H:i:s')
                ];
                $row[] = $data;
            }
        }
        if ($this->M_daftar_nilai->insert_batch('tb_penilaian', $row)) {
            $json = [
                'result' => 'success'
            ];
            echo json_encode($json);
        } else {
            show_404();
        }
    }
};;
