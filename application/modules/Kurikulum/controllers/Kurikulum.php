<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Humas'
        ];
        return view('Kurikulum.views.v_kurikulum', $data);
    }
};
