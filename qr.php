<?php
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file");
}
$array = json_decode(file_get_contents("file/" . $_GET['id'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
header("Content-Type: image/png");
header('Content-Disposition: filename="' . $filename . '"');
readfile("https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://sudaox.tech/sharecenter/file.php?f=" . $id);