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

			session_destroy();

			header('Location: main.php');

		?>

	</body>
</html>
