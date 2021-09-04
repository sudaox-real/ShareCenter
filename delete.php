<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file");
}
$array = json_decode(file_get_contents("file/" . $_GET['id'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
$ip = $array['ip'];
$uip = $_SERVER['REMOTE_ADDR'];
//echo($ip);
//echo($_SERVER['REMOTE_ADDR']);
if($uip === $ip) {

}
else {
	die("You do not own this file.");
}
if(isset($_GET['c'])) {
	if($_GET['c'] === "1") {
		unlink("file/" . $id);
		die("Deleted successfully.");
	}
}
?>
<html>
<head>
<title>ShareCenter</title>
<style>
	img.preview {
		max-width: 100%;
	}
</style>
</head>
<body>
<center>
<h3>ShareCenter - The simple way to share</h3>
<p>Are you sure you want to delete the file <?php echo($filename); ?>? </p> 
<a href="?id=<?php echo($id); ?>&c=1">Yes</a><a href="file.php?f=<?php echo($id); ?>"> No</a>
</center>
</body>
</html>