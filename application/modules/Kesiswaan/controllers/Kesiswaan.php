<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesiswaan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'activeSide' => 'pelanggaran_siswa',
        ];
        return view('Kesiswaan.views.pelanggaran_siswa', $data);
    }
};
