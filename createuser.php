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
    <title>Create user</title>
  </head>
  <body>

			<section class="h-100 gradient-form">
	    <div class="container py-3 h-100">
	      <div class="row d-flex justify-content-center align-items-center h-100">
	        <div class="col-xl-6">
	          <div class="card rounded-3 text-black">
	            <div class="col-lg">
	              <div class="card-body p-md-5 mx-md-4">

	                <div class="text-center">
	                  <img src="https://pngimg.com/uploads/astronaut/astronaut_PNG56.png"
	                  style="width: 185px;" alt="logo">
	                  <h4 class="mt-1 mb-5 pb-1">Are you ready to become a part of the Astronaut club?</h4>
	                </div>

	                <form method="POST">
	                <p>Create User</p>

	                <div class="form-outline mb-3">
	                  <label class="form-label" for="firstname">First name</label>

	                  <input type="text" name="firstname" class="form-control" placeholder="John" required/>
	                </div>

									<div class="form-outline mb-3">
	                  <label class="form-label" for="lastname">Last name</label>

	                  <input type="text" name="lastname" class="form-control" placeholder="Smith" required/>
	                </div>

									<div class="form-outline mb-3">
	                  <label class="form-label" for="uid">Username (UID)</label>

	                  <input type="text" name="uid" class="form-control" placeholder="mtcicero" required/>
	                </div>

	                <div class="form-outline mb-3">
	                  <label class="form-label" for="password">Password</label>

	                  <input type="password" name="password" class="form-control" placeholder="**********" required/>
	                </div>

									<div class="form-outline mb-3">
	                  <label class="form-label" for="retype_password">Re-type password</label>

	                  <input type="password" name="retype_password" class="form-control" placeholder="**********" required/>
	                </div>

	                <div class="text-center">
	                  <input type="submit" class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-4" data-bs-toggle="modal" data-bs-target="#UserAlreadyExists" value="Sign up!">
	                </div>

									<div class="d-flex align-items-center justify-content-center">
										<p class="mb-0 me-2">Already have an account?</p>
										<a href="login.php"> <button type="button" class="btn btn-outline-danger">Login</button> </a>
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

			if (!empty($_SESSION['user']))
			{
				header("Location: main.php");
				exit;
			}

      if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['uid']) && isset($_POST['password'])){

        $firstName       = $_POST['firstname'];
        $lastName        = $_POST['lastname'];
        $uid             = $_POST['uid'];
        $password        = $_POST['password'];
        $retype_password = $_POST['retype_password'];

        if ($password == $retype_password){

          $allusers = get_uids();

          if (in_array($uid, $allusers)){
						?>
						<div class="modal fade" id="UserAlreadyExists" tabindex="-1">
						  <div class="modal-dialog modal-dialog-centered">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title">Warning!</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body">
						        <p>User already exists. Try a different Username (UID)!</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

          <?php
					}
          else {

            add_user($uid, $firstName, $lastName, $password);

						login($uid, $password);

						if (login($uid, $password) == true){
								$SES_User = get_user($_POST['uid']);

			    			$_SESSION['user'] = $SES_User['uid'];
			        }
						}

						header("Refresh: 2");
          }
        }
      ?>
    </form>

		<!-- Bootstrap Bundle with Popper ses nedenfor-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
