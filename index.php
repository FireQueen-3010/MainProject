<!DOCTYPE html>
<html>
<head>
	<title>Feature Selection</title>
	<style>
	img.vert-move {
		-webkit-animation: mover 0.5s infinite  alternate;
		animation: mover 0.5s infinite  alternate;
	}
	img.vert-move {
		-webkit-animation: mover 0.5s infinite  alternate;
		animation: mover 0.5s infinite  alternate;
	}
	@-webkit-keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
	@keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
	</style>
</head>
<body style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%); color: white;">
<h1 style="font-size: 7rem; text-align: center; 
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Depersonalize</h1>
<img src="maskman2.png" style="display: block; margin-left: auto; margin-right: auto; width: 30%;" class="vert-move"/>
<div style="text-align: center;">
<h2 style="font-size: 2rem">Let's Depersonalize your data with the power of SelectK-Best and K-Anonymity!</h2>
<form action="process_file.php" method="post" enctype="multipart/form-data" style="font-size: 2rem">
<label for="file">Upload the dataset to be anonymized in CSV format:</label>
<input type="file" name="file" id="file" style="font-size: 2rem"><br><br>
<label for="filename">Enter the filename:</label>
<input type="text" name="filename" id="filename" style="font-size: 2rem"><br><br>
<input type="submit" name="submit" value="Submit" style="font-size: 2rem">
</form>
</div>
</body>
</html>
