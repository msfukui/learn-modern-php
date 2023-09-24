<?php

if(file_exists(__DIR__ . preg_replace("/\.(json|html|txt|css|js|jpe?g|png|gif|svg|woff|eot).*\z/i", ".$1", $_SERVER["REQUEST_URI"]))) {
    return false;
} else {
    require __DIR__ . "/index.php";
}
