<?php

function idgenerator($totalRows, $kode)
{
    if ($totalRows > 0) {
        $totalRows += 1;
        $usrlen = strlen($totalRows) + 2;
        $generateCode = $kode . str_pad($totalRows, $usrlen, "0", STR_PAD_LEFT) . rand(1, 999);
        return $generateCode;
    } else {
        $totalRows = 1;
        $usrlen = strlen($totalRows) + 2;
        $generateCode = $kode . str_pad($totalRows, $usrlen, "0", STR_PAD_LEFT) . rand(1, 999);
        return $generateCode;
    }
}
