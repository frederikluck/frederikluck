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

    <!-- Stylesheet link ses nedenfor-->
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Edit post</title>
  </head>
  <body>

        <?php

				$pid    			= $_GET['pid'];
        $Post         = get_post($pid);
        $PostTitle    = $Post['title'];
        $PostContent  = $Post['content'];

        if (!empty($_SESSION['user']) && $Post['uid'] == $_SESSION['user']){ ?>
					<section class="h-100 gradient-form">
					<div class="container py-3 h-100">
						<div class="row d-flex justify-content-center align-items-center h-100">
							<div class="col-xl-6">
								<div class="card rounded-3 text-black">
									<div class="col-lg">
										<div class="card-body p-md-5 mx-md-4">

											<form method="POST">
											<h3 style="text-align: center">Edit Post</h3>

											<div class="form-outline mb-3">
												<label class="form-label" for="title">Title:</label>
												<?php echo "
												<input type='text' name='title' class='form-control' value='$PostTitle' required/>
												";?>
											</div>

											<div class="form-outline mb-3">
												<label class="form-label" for="lastname">Content: </label>

												<?php echo "
												<textarea class='form-control' rows='18' name='content'>$PostContent</textarea>
												";?>
											</div>

											<div style="text-align: center; padding: 15px">
												<button type="submit" id="submitBtn" name="button" class="btn btn-danger">
													Save changes
												</button>
											</div>
											</form>
											<?php

											$PostTitle 	 = $_POST['title'];
											$PostContent = $_POST['content'];

											modify_post($pid, $PostTitle, $PostContent);

											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</section>

				<?php
			}
			else
			{

				header('Location: login.php');

			} ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
