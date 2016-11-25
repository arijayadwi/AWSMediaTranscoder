<?php

	session_start();
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$_SESSION["targetdir"] = $target_dir;
	$_SESSION["targetfile"] = $target_file;

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
			// echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} 
		// else {
		//     echo "File is not an image.";
		//     $uploadOk = 0;
		// }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	/*if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}*/
	// Allow certain file formats
	// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	// && $imageFileType != "gif" ) {
	//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	//     $uploadOk = 0;
	// }
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			
		} else {
			//echo "Sorry, there was an error uploading your file.";
		}
	}
	
	if(isset($_POST['submit']))
	{
		$output_name = $_POST['output_name'];
		$output_format = $_POST['output_format'];
		$output_path = 'download/'.$output_name.'.'.$output_format;
		
		$resolution = $_POST['resolution'];
		$w = null;
		$h = null;
		$flag = false;
		
		switch($resolution){
			case("0"):
				$flag = true;
				break;
			case("1"):
				$w = "320";
				$h = "240";
				break;
			case("2"):
				$w = "480";
				$h = "320";
				break;
			case("3"):
				$w = "720";
				$h = "640";
				break;
			case("4"):
				$w = "1280";
				$h = "720";
				break;
			case("5"):
				$w = "2048";
				$h = "1280";
				break;
		}
		
		$time = time();
		
		if($flag){
			if ($output_format == "tiff"){
				$output2 = exec("ffmpeg -i $target_file -pix_fmt rgb24 $output_path");
			}
			else{
				$output2 = exec("ffmpeg -i $target_file $output_path");
			}
		}
		else{
			if ($output_format == "tiff"){
			$output2 = exec("ffmpeg -i $target_file -pix_fmt rgb24 -vf scale=w=$w:h=$h:force_original_aspect_ratio=decrease $output_path");
			}
			else{
				$output2 = exec("ffmpeg -i $target_file -vf scale=w=$w:h=$h:force_original_aspect_ratio=decrease $output_path");
			}
		}
		
		$time = time() - $time;
		$_SESSION["output"] = $output_path;
	}



?>

<!DOCTYPE html>
<html>
<head><title>Converter</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            text-align: center;
            font-family: "Source Sans Pro", sans-serif;
            font-weight: 300;
            background: -webkit-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: -moz-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: -ms-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: -o-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            margin-top: 30vh;
        }

        .well {
            background-color: #fff !important;
            border-radius: 0 !important;
            border: none !important;
        }

        .well.login-box {
            width: 300px;
            margin: 50px auto;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CONVERTER B4</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="image_form.php">Image</a>
                    </li>
                    <li>
                        <a href="audio_form.php">Audio</a>
                    </li>
                    <li>
                        <a href="video_form.php">Video</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-12" >
            <img style="margin: 0 auto" class="img-responsive" src="imageicon.png" width="300px" height="300px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                
                    <legend><h1>Image Converting Success!!</h1></legend>
                    <!-- <h3>Please identify yourself!</h3> -->
                    <label class="control-label">Name : <?php echo $output_name?>.<?php echo $output_format?></label><br>
                    <label>Size : <?php echo filesize($output_path)?> bytes</label><br>
                    <label>Compression Rate : <?php echo filesize($output_path)/filesize($target_file)*100?>%</label>
					<label>Execution Time : <?php echo $time?> seconds</label>
                    <form action="downloadImage.php" method="post" enctype="multipart/form-data">
                        
                        <input type="submit" class="btn btn-block" value="Download" name="submit"  />

                    </form>

            </div>
        </div>
    </div>
</div>
<span id="load" style="display: none"></span>

</body>

</html>