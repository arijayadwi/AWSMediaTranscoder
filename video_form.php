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
            <img style="margin: 0 auto" class="img-responsive" src="Video.png" width="300px" height="300px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                
                    <legend>Video Converter</legend>
                    <!-- <h3>Please identify yourself!</h3> -->
                    

                    <form action="upload_video.php" method="post" enctype="multipart/form-data">
                        
                        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                        <br>
                        <br>
                        <p>Input bitrate</p>
                        <select class="form-control" name="bitrate">
                          <option value="800k">800 Kbps</option>
                          <option value="1000">1000 Kbps</option>
                          <option value="1200">1200 Kbps</option>
                          
                        </select>
                        <br>
                        <p>Frame rate</p>
                        <select class="form-control" name="fps">
                          <option value="30">30</option>
                          <option value="60">60</option>
                          <option value="90">90</option>
                          
                        </select>
                        <br>
                        <p>Resolution</p>
                        <select class="form-control" name="res">
                          <option value="480*360">480x360</option>
                          <option value="640*480">640x480</option>
                          <option value="800*600">800x600</option>
                          
                        </select>
                        <!--  <p>Input resolusi</p> -->
                        <!-- <select name="resolusi">
                          <option value="'scale=w=320:h=240'">320x240</option>
                          <option value="'scale=w=640:h=480'">640x480</option>
                          <option value="'scale=w=800:h=600'">800x600</option>
                          
                        </select>
                        <br>
                        <br> -->
                        <br>
                        <p>Sampling rate</p>
                        <select class="form-control" name="srate">
                          <option value="16000">16.000 Hz</option>
                          <option value="22050">22.050 Hz</option>
                          <option value="32000">32.000 Hz</option>
                          <option value="44100">44.100 Hz</option>
                          
                        </select>
                        <br>
                        <p>Audio Channel</p>
                        <select class="form-control" name="audioch">
                          <option value="2">Stereo</option>
                          <option value="1">Mono</option>                          
                        </select>
                        <br>
                        <p>Output format</p>
                        <select class="form-control" name="format">
                          <option value="flv">flv</option>
                          <option value="mkv">mkv</option>
                          <option value="3gp">3gp</option>
                          <option value="mpeg">mpeg</option>
                          <option value="avi">avi</option>
                          
                        </select>
                        <br>
                        <br>
                        <!-- <input type="submit" value="Upload Audio" name="submit"> -->
                        
                        <input type="submit" class="btn btn-block" value="Next" name="submit"  />

                    </form>

                
            </div>
        </div>
    </div>
</div>
<span id="load" style="display: none"></span>

</body>

</html>
