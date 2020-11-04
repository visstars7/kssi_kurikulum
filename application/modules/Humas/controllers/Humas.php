<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Humas extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'activeSide' => 'dashboard',
        ];
        return view('Humas.views.dashboard', $data);
    }
}
