<?php
session_start();
require_once "/home/mir/lib/db.php";
?>

<?php

	for ($i=0; $i < count($_FILES['file']['name']); $i++){
		$fileName = $_FILES['file']['name'][$i];
		$tmp_path = $_FILES['file']['tmp_name'][$i]; // temp file path fra billede id  r
		$fileExt 			 = explode('.', $fileName);
		$fileActualExt = ".".strtolower(end($fileExt));

		$iid = add_image($tmp_path, $fileActualExt); // Billedet er tilføjet. Tilskrives som en variabel da billedet returnerer billede id.

		add_attachment($pid, $iid); // Billedet bliver tilføjet til indlæg, der er lavet af brugeren
	}

 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
