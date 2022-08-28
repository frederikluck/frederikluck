<?php
session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";

if (empty($_SESSION['user']))
{
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<!-- Bootstrap Link nedenfor -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Stylesheet link nedenfor -->
		<link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Create post</title>
  </head>
  <body>

	<section class="h-100 gradient-form">
	<div class="container py-3 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-xl-6">
				<div class="card rounded-3 text-black">
					<div class="col-lg">
						<div class="card-body p-md-5 mx-md-4">

							<form method="POST" enctype="multipart/form-data">
							<h3 style="text-align: center">Create Post</h3>

							<div class="form-outline mb-3">
								<label class="form-label" for="title">Title:</label>

								<input type="text" name="title" class="form-control" placeholder="WITS is the best course ever" required/>
							</div>

							<div class="form-outline mb-3">
								<label class="form-label" for="content">Content: </label>

								<textarea class="form-control" rows='12' name='content' placeholder="Why's that you may ask? Well, let me explain..."></textarea>
							</div>

							<div>
								<input type="file" name="file[]" multiple=multiple />
								<label for="file" style="font-size: 12px; color: grey">Filetypes must be: .jpg, .jpeg, .png, .gif or .svg
								</label>
							</div>

							<div style="text-align: center; padding: 15px">
								<button type="submit" class="btn btn-danger" name="submitPost">
								Create post
								</button>
							</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>

    <?php

		if (isset($_POST['submitPost']) && !empty($_POST['title']) && !empty($_POST['content'])) {
      // her bliver opslag tilføjet samt henter post id til en variabel
      $pid = add_post($_SESSION['user'], $_POST['title'], $_POST['content']);

			// hvis bruger har tilføjet billede, tilføjes billedet til postet
			if (isset($_FILES['file']['name'])){
				include ("addImage.php");
			}

			header("Refresh: 0; url=posts.php?pid=$pid");
			// siden refresher sig, så bruger kan se det nye post personen har lavet.
		}

    ?>
		<!-- Bootstrap Bundle with Popper er linket nedenfor -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
