<?php

$extension = 'png';

$texto = match($extension){
    "png", "jpeg", "png", "webp" => "icon-media",
    "pdf", "docx", "txt"  => "icon-doc",
    "php", "js", "html", "css" => "icon-code",
    default => "icon-file",
};


echo $texto;

?>