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
    <title>All posts</title>
  </head>
  <body>

	    <?php
	    $pids = get_pids();

	    echo '<div class="container" style="padding: 30px">
				<h4 style="text-align: center; color: #FFF">'.
				"All posts in existing database: ".
				count($pids).'</h4>'.
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
					foreach ($pids as $pid) {            // for hvert element i array sker der følgende:

						$post 		= get_post($pid);
						$title 		= $post['title'];
						$content 	= $post['content'];
						$owner 		= $post['uid'];
						echo "
						<div class='card' style='margin: 10px'>
						  <div class='card-header'>
						    <a href='posts.php?pid=$pid'>$title</a>
						  </div>

						  <div class='card-body'>
						    <blockquote class='blockquote mb-0' style='font-size: 15px'> ";

									echo '
						      <p style="font-size: 15px">'.substr($content, 0, 125).'...'.'</p>
									';

									echo "
						      <footer class='blockquote-footer'>Owner: <cite title='Source Title'><a href='user.php?uid=$owner'>$owner</a></cite></footer>

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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
