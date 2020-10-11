<?php
function checkpict($type, $index = "", $file = "")
{
    if ($type == "update-profile") {
        if (!empty($file[$index]['name'])) {
            if ($file[$index]['type'] == "image/jpeg" || $file[$index]['type'] == "image/png") {
                $extensi = explode(".", $file[$index]['name']);
                $name    = random_int(1, 9999) . "." . $extensi[1];

                $place   = $_SERVER['DOCUMENT_ROOT'] . "/hook_up/upload/uploaded/" . $name;

                if (move_uploaded_file($file[$index]['tmp_name'], $place)) {
                    return base_url('upload/uploaded/') . $name;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    } elseif ($type == "default-profile") {
        return base_url('upload/default/image-default.jpg');
    } elseif ($type == "default-banner") {
        return base_url('upload/default/default-banner.png');
    } elseif ($type == "addArtikel") {

        if (!empty($file[$index]['name'])) {

            if ($file[$index]['type'] == "image/jpeg" || $file[$index]['type'] == "image/png") {
                $extensi = explode(".", $file[$index]['name']);
                $name    = random_int(1, 9999) . "." . $extensi[1];

                $place   = $_SERVER['DOCUMENT_ROOT'] . "/hook_up/upload/thumbnail/" . $name;

                if (move_uploaded_file($file[$index]['tmp_name'], $place)) {
                    return base_url('upload/thumbnail/') . $name;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    } elseif ($type == "default-thumbnail") {
        return base_url('upload/default/default-banner.png');
    }
}
