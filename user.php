<?php
session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<!-- Bootstrap Link ses nedenfor -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Stylesheet link ses nedenfor -->
		<link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>User-profile</title>
  </head>
  <body>


		<section class="h-100 gradient-form">
		<div class="container py-3 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-10">
					<div class="card rounded-3 text-black">
						<div class="col-lg">
							<div class="card-body p-md-5 mx-md-4">
    <?php

    $input_uid = $_GET['uid'];                    // get uid from input
    $userposts = get_pids_by_uid($input_uid);     // get pids from uid
    $username = get_user($input_uid);             // allows access to user array

		echo '<h1>', "Personlig profil for brugerID'et: ", $input_uid, '</h1>';
    echo "<p>Navn: ".$username['firstname']." ".$username['lastname']."<br>Dato oprettet: ".$username['date'].'</p>';

		echo "<p><b> Oprettede oplæg: </b></p>";

	  foreach ($userposts as $usrpst){              // for each pid in array, do this

	    $post 			= get_post($usrpst);          // get arrays
	    $posttitle	= $post['title'];        // value of arrays being title
	    $postlink 	= $post['pid'];           // gets content related to pid
			$postcontent = $post['content'];

			echo "
			<div class='card' style='margin: 10px'>
				<div class='card-header' style='font-size: 15px'>
					<a href='posts.php?pid=$postlink'>$posttitle</a>
				</div>

				<div class='card-body'>
					<blockquote class='blockquote mb-0' style='font-size: 15px'> ";

						echo "
						<p style='font-size: 15px'></p>
						<footer class='blockquote-footer'>".substr($postcontent, 0, 500)."..."."</footer>
					</blockquote>
				</div>
			</div>";


	  }

    ?>
	</div>
</div>
</div>
</div>
</div>
</div>
</section>
  </body>
</html>
