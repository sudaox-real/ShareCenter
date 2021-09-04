<?php
if(!file_exists("file/" . $_GET['id'] . ".json")) {
    die("Invalid file");
}
$array = json_decode(file_get_contents("file/" . $_GET['id'] . ".json"), true);
$filename = $array['fname'];
$id = $array['id'];
?>
<html>
<head>
<title>ShareCenter</title>
<link rel="canonical"
  href="/sharecenter/file.php?f=<?php echo($id); ?>">
  <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="ElA4cNTQ"></script>
<center>
<h3>ShareCenter - The simple way to share</h3>
<p>Share methods:</p>
<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=Check out my file '<?php echo($filename); ?>' on ShareCenter!"
  data-size="large">
Tweet</a><br>
<a href="sms:0&body=Check out my file called <?php echo($filename); ?> at http://sudaox.tech/sharecenter/file.php?f=<?php echo($id); ?>">SMS</a><br>
<img src="qr.php?id=<?php echo($id); ?>" width="300" height="300">
</center>
</body>
</html>