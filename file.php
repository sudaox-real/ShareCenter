<?php
if(!file_exists("file/" . $_GET['f'] . ".json")) {
    die("Invalid file");
}
if(!file_exists("file/" . $_GET['f'])) {
    die("This file is no longer available.<br>Possible reasons:<br>The file violated our TOS<br>The user deleted the file");
}
$array = json_decode(file_get_contents("file/" . $_GET['f'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
?>
<html>
<head>
<title>ShareCenter</title>
<style>
	img.preview {
		max-width: 100%;
	}
</style>
<meta name="description" content="Download <?php echo(htmlspecialchars($filename)); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<center>
<h3>ShareCenter - The simple way to share</h3>
<a href="report.php?id=<?php echo($id); ?>">Report</a><br>
<a href="index.php">Upload your own file</a><br>
<a href="share.php?id=<?php echo($id); ?>">Share</a>
<a href="delete.php?id=<?php echo($id); ?>">Delete file</a>
<p>You are downloading <b><?php echo(htmlspecialchars($filename)); ?></b></p>
<a href="download.php?id=<?php echo(htmlspecialchars($id)); ?>"><button>Download</button></a><br>
<img id="preview" class="preview" style="display: <?php $is_picture = getimagesize("file/" . $id)!==FALSE; if($is_picture) { echo("inline"); } else { echo("none"); } ?>;" src="preview.php?id=<?php echo($id); ?>">
<?php
if($is_picture) {
	echo("<br>");
}
?>
</center>
</body>
</html>