<?php
namespace Mini\Controller;

use Mini\Model\Nonegag;
use Mini\Model\Admin;

class NonegagController
{
	public function index()
	{
		if(session_status() == PHP_SESSION_NONE) session_start();
        print_r($_SESSION);
		require APP . 'view/_templates/header.php';
		require APP . 'view/Nonegag/index.php';
		require APP . 'view/_templates/footer.php';
	}
	public function fetchPosts($idRange)
	{
		 if (isset($idRange)) {
            $a = new Nonegag();
            try {
            	echo json_encode($a->getPost($idRange));
            } catch (Exception $e) {
            	echo "{error:'".$e."'}";
            }
        }
        else{echo "{}";}
	}
}