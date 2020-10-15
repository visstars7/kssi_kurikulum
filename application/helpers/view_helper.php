<?php

use Jenssegers\Blade\Blade;

// use guide: view('modules.views.nama_file_view',$data);

if (!function_exists('view')) {
    function  view($view, $data = [])
    {
        $path = APPPATH . "modules";
        $blade = new blade($path, $path . '/cache');
        echo $blade->make($view, $data);
    }
}
