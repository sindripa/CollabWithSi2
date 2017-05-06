<?php require_once("connection.php"); ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Upload</title>
    </head>
    <body>

        <form action="http://46.101.24.156/Upload/insert" method="post">

        <label>Post title: </label>
        <input type="text" name="imageName" required ><br>
        
        <label>Image URL: </label>
        <input type="text" name="imagePath" required ><br>

        <input type="submit">

        </form>

    </body>
</html>