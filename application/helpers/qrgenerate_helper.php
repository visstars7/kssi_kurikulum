<?php

function qrgenerate($data, $folder, $name)
{
    $CI = &get_instance();
    $CI->load->library('ciqrcode/Ciqrcode');

    $params['data']  = encode(encode($data));
    $params['level'] = 'H';
    $params['size'] = '5';
    $name = $name . "-" . rand(0, 999);
    $params['savename'] = FCPATH . "assets/$folder/$name.png";
    $CI->ciqrcode->generate($params);
    return $params['savename'];
};
