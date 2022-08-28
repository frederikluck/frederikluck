<?php
session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

		<!-- Stylesheet link nedenfor-->
		<link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Post by <?php echo $userid?></title>
  </head>
  <body>
  <?php
    // Id's bliver hentet. Derfa gemmes som variabel
    $cid = $_GET['id'];

    // Kommentar bliver hente for det givne id, og gemmes som variabel
    $tempComment = get_comment($cid);


		delete_comment($cid);

    // Bruger bliver redicted tilbage til det post, personen kom fra
  	header ("Location:posts.php?pid=".$tempComment['pid']);
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
