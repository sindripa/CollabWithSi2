<?php
namespace Mini\Controller;

class NonegagController
{
	public function index()
	{
		if(session_status() == PHP_SESSION_NONE) session_start();

		require APP . 'view/_tempate/header.php';
		require APP . 'view/Nonegag/index.php';
		require APP . 'view/_tempate/footer.php';
	}
}