<?php
if(isset($_POST['submit'])){
	// Check if file was uploaded without errors
	if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
		$filename = $_POST['filename'];
		$upload_dir = "./uploads/";
		$upload_path = $upload_dir . $filename;
		// Move the uploaded file to the upload directory
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)){
			// Call the Python script with the filename as a command-line argument
			$command = "script.py" . $upload_path;
			exec($command, $output, $status);
			if($status == 0){
				echo "Anonymized dataset saved to BigBasket_anonymized.csv<br>";
				echo "Feature selection scores plot saved to feature_scores.png<br>";
			}else{
				echo "File uploaded, please run the Python Script now! Novel project created by Diksha (32), Satwika (39), Meghana (45) and Manaswini (08)";
			}
		}else{
			echo "File upload unsuccessful";
		}
	}else{
		echo "No file uploaded";
	}
}
?>