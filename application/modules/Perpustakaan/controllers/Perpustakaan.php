<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'activeSide' => 'e_book',
        ];
        return view('Perpustakaan.views.perpustakaan', $data);
    }
}
