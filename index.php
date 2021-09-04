<html>
<head>
<title>ShareCenter</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<center>
<h3>ShareCenter - The simple way to share</h3>
<form id="upload" action="upload.php" method="post" enctype="multipart/form-data">
  Select your file:</br>
  <input type="file" name="fileToUpload" id="fileToUpload">
</form>
<script>
document.getElementById("fileToUpload").onchange = function() {
    document.getElementById("upload").submit();
};
</script>
</center>
</body>
</html>