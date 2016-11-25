<?php
session_start();

$Nama = $_GET["nama"];
$dir = $_SESSION["targetdir"];
$target = $_SESSION["targetfile"];
$bitrate = $_SESSION["bit_rate"];
$format = $_SESSION["format_value"];
$sampling_rate = $_SESSION["sampling_rate"];
$audio_ch = $_SESSION["audio_ch"];
$output = "download/";
$_SESSION["name"] = $Nama;
$_SESSION["output"] = $output;
// echo $Nama;
// echo $dir;
// echo $target;
// echo $bitrate;
$replace = str_replace(" ","_",$target);
$target2 =rename("$target", "$replace");

// echo "||";
$file =  $output.$Nama.".".$format;
// echo filesize($file);
// echo "||";
// echo filesize($target);
if($format=="ogg"){
    $output2 = exec("ffmpeg -i $replace -c:a libvorbis -q:a $bitrate -ar $sampling_rate -ac $audio_ch $output".$Nama.".$format");    
}else{
    $output2 = exec("ffmpeg -i $replace -b:a $bitrate -ar $sampling_rate -ac $audio_ch $output".$Nama.".$format");
}
//$output = shell_exec('cartoon001.wav converted-upload.mp3');
//$output = exec("ffmpeg -i cartoon001.wav outputfile.mp3");
//echo "Done";
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
            <img style="margin: 0 auto" class="img-responsive" src="Audio.png" width="300px" height="300px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                
                    <legend><h1>Audio Converting Success!!</h1></legend>
                    <!-- <h3>Please identify yourself!</h3> -->
                    <label class="control-label">Name : <?php echo $Nama?>.<?php echo $format?></label><br>
                    <label>Size : <?php echo filesize($file)?> bytes</label><br>
                    <label>Compression Rate : <?php echo filesize($file)/filesize($replace)*100?>%</label>
                    <form action="downloadAudio.php" method="post" enctype="multipart/form-data">
                        
                        <input type="submit" class="btn btn-block" value="Download" name="submit"  />

                    </form>

            </div>
        </div>
    </div>
</div>
<span id="load" style="display: none"></span>

</body>

</html>