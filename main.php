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
		<title>Main</title>
	</head>
	<body>

			<section class="h-100 gradient-form">
	    <div class="container py-3 h-100">
	      <div class="row d-flex justify-content-center align-items-center h-100">
	        <div class="col-xl-10">
	          <div class="card rounded-3 text-black">
	            <div class="col-lg">
	              <div class="card-body p-md-5 mx-md-4">

				<div class="container" style="text-align: center">
						<h1>Main page</h1>
						<hr>
				</div>

				<div class="row" style="padding: 15px 0px"> <!-- 15px = bund & top, 0px = højre & venstre -->
					<div class="col-4">

						<div class='card'>
							<div class='card-header' style="text-align: center; vertical-align: center; min-height: 115px">
							See all users in the database
							</div>

							<div class='card-body'>
								<blockquote class='blockquote mb-0'>
									<div class="d-flex align-items-center justify-content-center">
										<a href="allusers.php"> <button type="button" class="btn btn-danger">All Users</button> </a>
									</div>
								</blockquote>
							</div>
						</div>
					</div>

					<div class="col-4">

						<div class='card'>
							<div class='card-header' style="text-align: center; vertical-align: center; min-height: 115px">
							Your own profile
							</div>

							<div class='card-body'>
								<blockquote class='blockquote mb-0'>
									<div class="d-flex align-items-center justify-content-center">
										<?php if (empty($_SESSION['user'])){ ?>
											<a href='login.php'>
											<button type='button' class='btn btn-danger'>
											User Profile
											</button>
											</a>

										<?php } else { ?>
											<a href='user.php?uid=<?php echo $_SESSION['user'] ?>'>
											<button type='button' class='btn btn-danger'>
											User Profile
											</button>
											</a>
										<?php
										}
										?>

									</div>
								</blockquote>
							</div>
						</div>
					</div>

					<div class="col-4">

						<div class='card'>
							<div class='card-header' style="text-align: center; vertical-align: center; min-height: 115px">
							See all posts in the database
							</div>

							<div class='card-body'>
								<blockquote class='blockquote mb-0'>
									<div class="d-flex align-items-center justify-content-center">
										<a href="allposts.php"> <button type="button" class="btn btn-danger">All posts</button> </a>
									</div>
								</blockquote>
							</div>
						</div>
					</div>



				</div>

				<div class="row" style="text-align: center">
					<div class="col 6">

						<div class='card'>
							<div class='card-header' style="text-align: center; min-height: 85px">
					Not a member already?	Sign up here:
							</div>

							<div class='card-body'>
								<blockquote class='blockquote mb-0'>
									<div class="d-flex align-items-center justify-content-center">
										<a href="createuser.php"> <button type="button" class="btn btn-danger">Let's sign up!</button> </a>
									</div>
								</blockquote>
							</div>
						</div>

					</div>

					<div class="col 6">
						<div class='card'>
							<div class='card-header' style="text-align: center; min-height: 85px">
							Already a registered member? Login here:
							</div>

							<div class='card-body'>
								<blockquote class='blockquote mb-0'>
									<div class="d-flex align-items-center justify-content-center">
										<a href="login.php"> <button type="button" class="btn btn-danger">Let's login!</button> </a>
									</div>
								</blockquote>
							</div>
						</div>

				</div>

								</div>
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
