<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Silabus extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'activeSide' => 'silabus'
        ];
        return view('Kurikulum.views.silabus', $data);
    }
};
