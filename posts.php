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
    <title>Post</title>
  </head>
  <body>

    <?php

    $input_pid = $_GET['pid'];                    // get pid and save it as a variable
    $postid = get_post($input_pid);               // get post content from pid
    $userid = get_user($postid['uid']);           // get uid information from pid
    $useruid = $userid['uid'];
    $username = $userid['firstname']." ".$userid['lastname'];

		?>

		<section class="h-100 gradient-form">
		<div class="container py-3 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-10">
					<div class="card rounded-3 text-black">
						<div class="col-lg">
							<div class="card-body p-md-5 mx-md-4">

								<!-- Post content (billeder, kommentar etc.) -->
								<?php

								echo '<div class="container">';


									echo '<h1>'.$postid['title'].'</h1>';
									echo '<hr>';
									echo "<b> Posted by: </b>"."<a href='user.php?uid=$useruid'>$username</a>";
									echo '<br>';
									echo "<b> Post date: </b>", $postid['date'];

									echo '<hr>';
									echo '<p>'.$postid['content'].'</p>';
									echo '<br>';

									// vis Billeder der tilhører post
									foreach ($imageid = get_iids_by_pid($input_pid) as $iid){

										$imageinfo = get_image($iid);
										$image_url = $imageinfo['path'];

										echo "<img class='rounded float' src='$image_url' height='300'/>";

									}
									// Giver mulighed for ejeren at redigere postet
									if ($_SESSION['user'] == $useruid){

										$pid 	= $postid['pid'];
										$user = $_SESSION['user'];

										echo "<div class='d-flex align-items-center justify-content-center' style='padding: 15px 0'>
		                  <a href='editpost.php?pid=$pid&uid=$user'> <button type='button' class='btn btn-danger'>Edit post</button> </a>
		                </div>";

									}

							    echo '<hr>';

									// mulighed for at poste kommentar til et post.

									if (empty($_SESSION['user'])){
										echo "
										<blockquote class='blockquote mb-0'>
											<h3>Create comment</h3>
											<p>Astronaut, you need to be <a href='login.php'>logged in</a> to post comments.</p>

										</blockquote>

										<hr>";
									}
                  else {
										echo "
										<form method='POST'>
											<h3 style='text-align: center'>Create Comment</h3>

											<div class='form-outline mb-3'>
												<textarea class='form-control' rows='5' name='content' placeholder='Type your comment here...'></textarea>
											</div>

											<div class='text-center'>
												<input type='submit' class='btn btn-danger' value='Post comment'>
											</div>
										</form>";

										$comment = $_POST['content'];

										add_comment($_SESSION['user'], $input_pid, $comment);
									}

							    echo "<hr>";

									echo "<h3>All comments:</h3>";

							    // viser alle kommentar der tilhører postet
							    foreach (get_cids_by_pid($input_pid) as $cid){

							      $usercomment = get_comment($cid);          // gets cids for each comment
							      $userinfo = get_user($usercomment['uid']);  // gets uid for cid
							      $commentUID = $userinfo['uid'];
							      $username = $userinfo['firstname']." ".$userinfo['lastname'];

										if ($_SESSION['user'] == $commentUID || $_SESSION['user'] == $useruid){

											echo "
											<div class='card' style='margin: 10px'>
												<div class='card-header'>
													<a href='user.php?uid=$commentUID'>$commentUID</a>
												</div>

												<div class='card-body'>
													<blockquote class='blockquote mb-0'>";

														echo '<p>'.$usercomment["content"].'</p>

													</blockquote>

													<form>
														<div class="text-center">
                               <a href="deleteComment.php?id='.$cid.'">
															 <input type="button" class="btn btn-danger" value="Delete comment">
															 </a>
                            </div>
													</form>
												</div>
											</div>';

										} else {

											echo "
											<div class='card' style='margin: 10px'>
												<div class='card-header'>
													<a href='user.php?uid=$commentUID'>$commentUID</a>
												</div>

												<div class='card-body'>
													<blockquote class='blockquote mb-0'>";

														echo '<p>'.$usercomment["content"].'</p>

													</blockquote>
												</div>
											</div>';
										}
							    }

								echo '</div>';

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
