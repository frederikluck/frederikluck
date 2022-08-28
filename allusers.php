<?php
session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<!-- Bootstrap Link nedenfor -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Stylesheet link nedenfor-->
    <link rel="stylesheet" href="style.css">

    <meta charset="utf-8">
    <title>All users</title>
  </head>
  <body>

    <?php
    $uids = get_uids();

    echo '<div class="container" style="padding: 30px">
		<h4 style="text-align: center; color: #FFF">'.
		"All users in existing database: ".
		count($uids).'</h4>'.
		'</div>';
		?>

		<section class="h-100 gradient-form">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-8">
					<div class="card rounded-3 text-black">
						<div class="col-lg">
							<div class="card-body p-md-5 mx-md-4">

		<?php
    foreach ($uids as $uid) {            // for hvert element i array sker der følgende:

			$UID 				= get_user($uid);
			$UserID 		= $UID['uid'];
			$Firstname 	= $UID['firstname'];
			$Lastname 	= $UID['lastname'];

			echo "
			<div class='card' style='margin: 10px'>
				<div class='card-header'>
					UID:
					<a href='user.php?uid=$UserID'>$UserID</a>
				</div>

				<div class='card-body'>
					<blockquote class='blockquote mb-0'>";

						echo '<p style="font-size: 15px">'.'First name: '.$Firstname.'</p>
									<p style="font-size: 15px">'.'Last name: ' .$Lastname.'</p>

					</blockquote>
				</div>
			</div>';

    }
    ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
