<?php
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file.");
}
$array = json_decode(file_get_contents("file/" . $_GET['id'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
header("Content-Type: application/octet-stream");
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile("file/" . $id);