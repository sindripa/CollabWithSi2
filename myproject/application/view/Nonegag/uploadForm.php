<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input name="title" type="text"><br>
    <label for="url">URL:</label>
    <input name="url" type="text">
    or 
    <label for="username">select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>