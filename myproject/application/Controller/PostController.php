<?php
namespace Mini\Controller;

use Mini\Model\NoneGag;
use Mini\Model\PostPage;

class PostController
{
	public function privatePost($postID)
	{
		$myModel = new PostPage();
		$Post = $myModel->getOnePost($postID);
		$comments = $myModel->getComments($postID);
		require APP . 'view/_templates/header.php';
		require APP . 'view/Nonegag/Post.php';
		require APP . 'view/_templates/postFooter.php';
	}
	public function fetchComments($postID)
	{
		if (isset($postID)) {
		$myModel = new PostPage();
            try {
            	echo json_encode($myModel->getComments($postID));
            } catch (Exception $e) {
            	echo "{error:'".$e."'}";
            }
        }
        else{echo "{error: 'shit, no ID'}";}
	}
}