<?php


namespace Mini\Controller;

class UploadController
{
   
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/Upload/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function insert()
    {
        require APP . 'view/Upload/insert.php';
        header('location:'. URL.'Nonegag/index' );
    }
}
