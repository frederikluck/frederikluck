<?php
session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<!-- Bootstrap Link ses nedenfor-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Stylesheet link ses nedenfor -->
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>

  <body>


    <?php
        // 1) Hvis bruger er logget ind, bliver brugeren sendt til main.php
        if (!empty($_SESSION['user']))
        {
          header("Location: main.php");
          exit;
        }

        // 2) Hvis eksisterende bruger forsøger at logge ind = gem deres user og send dem til
        if (isset($_POST['username']) && $_POST['password'])
        {
          if (login($_POST['username'], $_POST['password']) == true)
          {
						// udfra bruger-input får vi UID. kan skabe problemer, hvis input-uid ikke stemmer overens med reelt UID, når dette sættes til "$_SESSION['user']"
						$SES_User = get_user($_POST['username']);

	    			$_SESSION['user'] = $SES_User['uid'];
	    			header("Location: main.php");

    			} else {

    			header("Location: login.php");
					echo "Det indtastede password er forkert. Prøv igen.";

    			}

        } else
    		{

        // 3)  ikke logget ind eller forkert login info = vises der form

echo <<<END
<!doctype html>
  <html>
  <head>
    <title>Login</title>
    </head>

    <body>

    <section class="h-100 gradient-form">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-5">
          <div class="card rounded-3 text-black">
            <div class="col-lg">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://pngimg.com/uploads/astronaut/astronaut_PNG56.png"
                  style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-3 pb-1">Welcome back Astronaut!</h4>
                </div>

                <form method="POST">

                <div class="form-outline mb-3">
                  <label class="form-label" for="username">Username</label>

                  <input type="text" name="username" class="form-control" placeholder="admin" />
                </div>

                <div class="form-outline mb-3">
                  <label class="form-label" for="password">Password</label>

                  <input type="password" name="password" class="form-control" placeholder="**********" />
                </div>

                <div class="text-center">
                  <input type="submit" class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-4" value="Log in">
                </div>

                <div class="d-flex align-items-center justify-content-center">
                  <p class="mb-0 me-2">Don't have an account?</p>
                  <a href="createuser.php"> <button type="button" class="btn btn-outline-danger">Sign up</button> </a>
                </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
</body>
</html>
END;

    		}
      ?>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
