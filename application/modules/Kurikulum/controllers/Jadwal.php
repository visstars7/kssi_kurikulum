<?php

use Illuminate\Support\Facades\Redirect;

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jadwal');
        $this->load->library('Schedules');
        $this->load->library('Pdf');
    }


    public function index()
    {
        $data = [
            'activeSide' => 'jadwal'
        ];
        return view('Kurikulum.views.jadwal', $data);
    }

    public function get()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $data = $this->input->post();
            $json = $this->M_jadwal->get($data['db'], $data['tb']);
            echo json_encode($json);
        } else {
            redirect(base_url('Kurikulum/Jadwal'));
        }
    }

    public function export()
    {
        $kelas = $this->input->post('nama_kelas');
        $tingkat = $this->input->post('tingkat');
        $where = [
            'tingkat_kelas' => $tingkat,
            'id_kelas' => $kelas
        ];
        $result = $this->M_jadwal->get_where('db', 'v_jadwal', $where);

        if (!empty($result)) {

            $data = [
                'kelas' => $result[0]['nama_kelas'],
                'result' => $result
            ];

            $this->pdf->setPaper('A2', 'potrait');
            $this->pdf->filename = encode($kelas) . ".pdf";
            $this->pdf->load_view('v_table_jadwal', $data);
        } else {
            Redirect(base_url('Kurikulum/jadwal'));
        }
    }

    public function reset()
    {
        if ($this->M_jadwal->reset('db', 'tb_jadwal')) {
            redirect(base_url('Kurkilum/jadwal'));
        }
    }

    public function generate()
    {
        $populasi = $this->input->post('populasi');
        $semester = $this->input->post('semester');
        $generasi = $this->input->post('generasi');
        $data  = [
            'sesi' => count($this->M_jadwal->get('db', 'tb_sesi_pelajaran')),
            'guru_mapel' => count($this->M_jadwal->get('db', 'tb_guru_mapel')),
            'ruang' => count($this->M_jadwal->get('db', 'tb_ruang')),
            'kelas' => 4
        ];
        // generate best solution
        $result = $this->schedules->main($populasi, 0.5, $generasi, $data);

        $sesi = $this->M_jadwal->get('db', 'tb_sesi_pelajaran');
        $guru_mapel = $this->M_jadwal->get('db', 'tb_guru_mapel');
        $ruang = $this->M_jadwal->get('db', 'tb_ruang');
        $kelas = $this->M_jadwal->get('master', 'kelas');
        foreach ($result as $key) {
            $data = [
                'id_sesi' => $sesi[$key[0]]['id_sesi'],
                'id_kelas' => $kelas[$key[3]]['id'],
                'id_guru_mapel' => $guru_mapel[$key[1]]['id_guru_mapel'],
                'id_ruang' => $ruang[$key[2]]['id_ruang'],
                'semester' => $semester,
                'tahun' => date('Y')
            ];
            $this->M_jadwal->insert('tb_jadwal', $data);
        }

        redirect(base_url('Kurikulum/jadwal'));
    }

    public function edit()
    {
        if ($this->input->is_ajax_request()) {
            $where = [
                'id_jadwal' => $this->input->post('id')
            ];
            $data = [
                'kelas' => $this->M_jadwal->get('master', 'kelas'),
                'sesi' => $this->M_jadwal->get('db', 'tb_sesi_pelajaran'),
                'ruang' => $this->M_jadwal->get('db', 'tb_ruang'),
                'guru_mapel' => $this->M_jadwal->get('db', 'tb_guru_mapel'),
                'jadwal' => $this->M_jadwal->get_where('db', 'v_jadwal', $where),
            ];

            echo json_encode($data);
        } else {
            redirect(base_url('Kurikulum/Jadwal'));
        }
    }

    public function update()
    {
        $data = $this->input->post();
        if ($this->M_jadwal->update('db', 'tb_jadwal', 'id_jadwal', $data['id_jadwal'], $data)) {
            redirect(base_url('Kurikulum/Jadwal'));
        } else {
            show_error('Error Update', 500, "Please check your models / controller");
        }
    }

    // Datatables
    public function jadwal_datatables()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->M_jadwal->get_datatables('v_jadwal');
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $field) {

                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $field->nip;
                $row[] = $field->nama_guru;
                $row[] = $field->nama_mapel;
                $row[] = $field->nama_ruang;
                $row[] = $field->sesi;
                $row[] = $field->nama_hari;
                $row[] = $field->semester;
                $row[] = $field->nama_kelas;
                $row[] = "<button class=' btn btn-sm btn-info px-3' data-toggle='modal' data-target='#edit' onclick=edit('$field->id_jadwal')><i class='fa fa-edit'></i></button>";
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_jadwal->count_all(),
                "recordsFiltered" => $this->M_jadwal->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            show_error("Ajax Error", 500, "An Error Was Encountered, check your network");
        }
    }
};
