<?php
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file");
}
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file");
}
$array = json_decode(file_get_contents("file/" . $_GET['id'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
$ext = substr(strtolower($filename), -3);
if($ext === "mp3") {
	header("Content-Type: audio/mp3");
	header('Content-Disposition: filename="' . $filename . '"');
	readfile("file/" . $id);
}