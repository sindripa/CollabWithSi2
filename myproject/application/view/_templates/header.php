<?php 
if(session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['adminBool'])) {
    header('location:'. URL.'Home/index' );
} ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NoneGAG</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">

    </head>
    <body>
        <nav class="navigation"><!-- NAVigation bar -->
            <ul>
                <li><a style="padding-top:0px;" class="nonegagIcon" href="http://46.101.24.156"><img style="height: 38px;" src="http://46.101.24.156/img/nonegag.jpg"></a></li>
                <li><a href="http://46.101.24.156">Home</a></li> <!-- 1000 or more upvotes -->
                <li><a>User</a></li> <!-- 100 or more upvotes -->
                <li><a href="http://46.101.24.156/Upload">Upload</a></li> <!-- -2 or more upvotes -->
                <li><a href="http://46.101.24.156/Home/logout">logout</a></li>
            </ul>
        </nav><br>