<?php
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file");
}
$array = json_decode(file_get_contents("file/" . $_GET['id'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
$is_picture = getimagesize("file/" . $id)!==FALSE;
if($is_picture) {
	header("Content-Type: image/png");
	header('Content-Disposition: filename="' . $filename . '"');
	readfile("file/" . $id);
}