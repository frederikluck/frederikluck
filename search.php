<?php
session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

		<?php

		$UserInput = $_GET['input'];
		$allusers = get_uids();
		$allposts = get_pids();
		$userINFO = get_user($UserInput);
		$username = $userINFO['uid'];

		if (in_array($UserInput, $allposts)){
			header("Location: posts.php?pid=$UserInput");

		} else if (in_array($username, $allusers)) {
			header("Location: user.php?uid=$username");
		}
		?>
	</body>
</html>
