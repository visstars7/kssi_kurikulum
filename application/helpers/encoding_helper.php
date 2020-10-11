<?php
function encode($string)
{
    return base64_encode(base64_encode(base64_encode($string)));
}

function decode($string)
{
    return base64_decode(base64_decode(base64_decode($string)));
}
