<?php
namespace Mini\Controller;

use Mini\Model\NoneGag;
use Mini\Model\Admin;

class NonegagController
{
	public function index()
	{
		$NonegagModel = new NoneGag();
		if(session_status() == PHP_SESSION_NONE) session_start();
		$newest = $NonegagModel->TopId()->fuck;
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
	}
	public function vote($info)//input example: url/cont/fun/P_id|operation
	{
		$NonegagModel = new Nonegag();
		$inputs = explode('Y', $info);
		$NonegagModel->Voting($inputs[0],$inputs[1]);
	}
	public function test(){$NonegagModel = new Nonegag();$newest = $NonegagModel->TopId()->fuck; echo $newest;}
	public function privatePost($postID)
	{
		
	}
}