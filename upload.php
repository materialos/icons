<?php
for ($i = 0; $i < count($_FILES['filesToUpload']['name']); $i++) {
	$author = $_POST["author"];
	$notes = $_POST["notes"];

	$target_dir = "uploads/icons/{$author}/";
	if (!is_dir($target_dir)) {
		if (!mkdir($target_dir, 0755, true)) {
			die('Failed to create folders.');
		}
	}

	$target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["filesToUpload"]["size"][$i] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "png" && $imageFileType != "psd" && $imageFileType != "svg" && $imageFileType != "ai" && $imageFileType != "sketch" && $imageFileType != "xcf") {
		echo "Sorry, only raster files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
			echo "The file ". basename( $_FILES["filesToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
if ($uploadOk = 1;) {
	shell_exec("bash corbinsdickprogram.sh " + $author + $notes);
}
?>