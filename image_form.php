<?php
session_start();
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
            <img style="margin: 0 auto" width="300px" height="300px" class="img-responsive" src="imageicon.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                
                    <legend>Image Converter</legend>
                    <!-- <h3>Please identify yourself!</h3> -->
                    

                    <form action="convert_image.php" method="post" enctype="multipart/form-data">
                        
                        <input class="form-control" type="file" name="image" id="image">
                        <br>
                        
                        
                        <br>
						<p>Output Name</p>
						<input class="form-control" type="text" name="output_name" id="output_name">
                        <p>Output Format</p>
                        <select class="form-control" name="output_format">
                          <option value="jpeg">.jpeg</option>
                          <option value="png">.png</option>
                          <option value="gif">.gif</option>
						  <option value="bmp">.bmp</option>
						  <option value="tiff">.tiff</option>
                          
                        </select>
                        
                        <br>
						<p>Resolution</p>
                        <select class="form-control" name="resolution">
						  <option value="0">Same as default</option>
                          <option value="1">320x240</option>
                          <option value="2">480x320</option>
                          <option value="3">720x640</option>
						  <option value="4">1280×720</option>
						  <option value="5">2048×1280</option>
                          
                        </select>
						
						<br>
                        <br>
                        <!-- <input type="submit" value="Upload Audio" name="submit"> -->
                        
                        <input type="submit" class="btn btn-block" value="Convert Image" name="submit"  />

                    </form>

                
            </div>
        </div>
    </div>
</div>
<span id="load" style="display: none"></span>

</body>

</html>
