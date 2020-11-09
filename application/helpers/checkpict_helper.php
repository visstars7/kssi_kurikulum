<?php
// digunakan untuk memindah file ke dalam direktori lokal
// basic user:: checkpict();
function checkpict($tipe = "", $index = "", $file = "", $folder = "")
{
    if (!empty($file[$index]['name'])) {
        if ($file[$index]['type'] == $tipe) {
            $extensi = explode(".", $file[$index]['name']);
            $name    = random_int(1, 9999) . "." . $extensi[1];

            $place   = $_SERVER['DOCUMENT_ROOT'] . "" . str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']) . "assets/$folder/" . $name;

            echo $place;
            die;

            if (move_uploaded_file($file[$index]['tmp_name'], $place)) {
                return base_url("assets/$folder/") . $name;
            } else {
                return false;
            }
        }
    }
}
    // } elseif ($type == "default-profile") {
    //     return base_url('upload/default/image-default.jpg');
    // } elseif ($type == "default-banner") {
    //     return base_url('upload/default/default-banner.png');
    // } elseif ($type == "addArtikel") {

    //     if (!empty($file[$index]['name'])) {

    //         if ($file[$index]['type'] == "image/jpeg" || $file[$index]['type'] == "image/png") {
    //             $extensi = explode(".", $file[$index]['name']);
    //             $name    = random_int(1, 9999) . "." . $extensi[1];

    //             $place   = $_SERVER['DOCUMENT_ROOT'] . "/hook_up/upload/thumbnail/" . $name;

    //             if (move_uploaded_file($file[$index]['tmp_name'], $place)) {
    //                 return base_url('upload/thumbnail/') . $name;
    //             } else {
    //                 return false;
    //             }
    //         }
    //     } else {
    //         return false;
    //     }
    // } elseif ($type == "default-thumbnail") {
    //     return base_url('upload/default/default-banner.png');
    // }
