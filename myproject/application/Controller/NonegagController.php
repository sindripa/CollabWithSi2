<?php
namespace Mini\Controller;

use Mini\Model\Nonegag;
use Mini\Model\Admin;

class NonegagController
{
	public function index()
	{
		$NonegagModel = new Nonegag();
		if(session_status() == PHP_SESSION_NONE) session_start();
<<<<<<< HEAD
		$newest = $NonegagModel->TopId();
=======
		$newest = $NonegagModel->TopId()->fuck;
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
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
        else{echo "{error: 'shit, no ID'}";}
<<<<<<< HEAD
	}
	public function vote($info)//input example: url/cont/fun/P_id|U_id|was|is      1|3|0|1
	{
		$NonegagModel = new Nonegag();
		$inputs = explode('|', $info);
		$NonegagModel->Voting($inputs[0],$inputs[1],$inputs[2], $inputs[3]);
=======
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
	}
	public function vote($info)//input example: url/cont/fun/P_id|U_id|was|is      1|3|0|1
	{
		$NonegagModel = new Nonegag();
		$inputs = explode('|', $info);
		$NonegagModel->Voting($inputs[0],$inputs[1],$inputs[2], $inputs[3]);
	}
	public function test(){$NonegagModel = new Nonegag();$newest = $NonegagModel->TopId()->fuck; echo $newest;}
}