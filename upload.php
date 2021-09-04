
<?php
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$target_dir = "file/";
$id = generateRandomString();
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $id;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fcheck = strtolower($imageFileType);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
   // echo "File is an image - " . $check["mime"] . ".";
   // $uploadOk = 1;
  } else {
    //echo "File is not an image.";
  //  $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  die("Well, this wasn't meant to happen. If you see this please tell us at <a href='mailto:pzcooldev@mail.ru'>pzcooldev@mail.ru</a>");
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 104857600) {
  die("Please make sure your file is under 100MB");
  $uploadOk = 0;
}

// Allow certain file formats
if($fcheck === "php" || $fcheck === "phtml" || $fcheck === "cgi" || $fcheck === "pl") {
  die("That file type isn't allowed.");
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $infarray = array();
      $infarray['fname'] = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
      $infarray['id'] = $id;
      $infarray['ip'] = $_SERVER['REMOTE_ADDR'];
      file_put_contents("file/" . $id . ".json", json_encode($infarray));
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("Location: file.php?f=" . $id);
  } else {
    echo "Error.";
  }
}
?>
