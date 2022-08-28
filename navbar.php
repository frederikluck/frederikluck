<?php
session_start();
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
	</head>
	<body>

		<?php
		$user = $_SESSION['user'];
		?>

		<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #00796B">

		    <div class="container-fluid">
					<nav class="navbar">
						<div class="container">
							<a class="navbar-brand" href="main.php">
								<img src="https://pngimg.com/uploads/astronaut/astronaut_PNG56.png" alt="" width="60">
							</a>
						</div>
					</nav>
		        <div class="navbar-collapse">
		            <ul class="navbar-nav me-auto">
		                <li class="nav-item">
		                    <a class="nav-link active" href="main.php">Home</a>
		                </li>

										<li class="nav-item">
		                    <a class="nav-link active" href="allusers.php">All Users</a>
		                </li>

										<li class="nav-item">
		                    <a class="nav-link active" href="allposts.php">All Posts</a>
		                </li>

										<li class="nav-item">
		                    <a class="nav-link active" href="createpost.php">Create a post</a>
		                </li>

										<li class="nav-item"> <!-- If user not logged in, redirect to login.php, otherwise if logged in, show userprofile -->
											<?php if (empty($_SESSION['user'])){
												echo "<a class='nav-link active' href='login.php'>User profile</a>";
											} else {
		                    echo "<a class='nav-link active' href='user.php?uid=$user'>User profile</a>";
											} ?>
		                </li>

										<?php
										if (empty($_SESSION['user'])){
		                echo '<li class="nav-item">
		                    <a class="nav-link active" href="login.php">Login / Sign-up</a>
		                </li>';
										} else {
											echo '<li class="nav-item">
			                    <a class="nav-link active" href="logout.php">Logout</a>
			                </li>';
										}
										?>

		            </ul>
		            <form class="d-flex" method="GET" action="search.php">
									<input type="text" class="form-control me-2" name="input" placeholder="Search for PIDs or UIDs..." style="width: 12vw">

									<button type="submit" class="btn btn-light">Search</button>
		            </form>

		        </div>
		    </div>
		</nav>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>
