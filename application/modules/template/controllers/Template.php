<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Hello World";
    }
}
