<?php

/**
 * Class SongsController
 * This is a demo Controller class.
 *
 * If you want, you can use multiple Models or Controllers.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\UserEdit;
use Mini\Model\Mynd;

class V7Controller
{
    public function index()
    {
        require APP . 'view/V7/signUp.php';
    }

    public function loginForm()
    {
        require APP . 'view/V7/login.php';//need update
    }
    public function addUser()
    {
        if (isset($_POST["CreateUser"])) {
            $UserEdit = new UserEdit();
            $UserEdit->addUser($_POST["username"], $_POST["password"], $_POST["email"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'V7/loginForm');
    }
    public function adminSight()
    {
        $UserEdit = new UserEdit();
        $MyndaEdit = new Mynd();
        $response = $UserEdit->login();
        $_SESSION['authenticatedID']=$response[2];
        $_SESSION['start']=$response[3];
        $_SESSION['adminBool']=$response[4];
        $user = $response[1];
        if ($response[0]=="admin") {
            $allirNotendur = $UserEdit->getAllUsers();
            $Myndir = $MyndaEdit->getAllInfo();
            require APP . 'view/V7/adminSight.php';
        }
        else if ($response[0]=="normal") {
            $Myndir = $MyndaEdit->PicByUser($user->id);
            require APP . 'view/V7/userPage.php';
        }
        else{
            header('location: ' . URL . 'V7/loginForm');
        }
    }

    public function signOut()
    {
        session_destroy();
        header('location: ' . URL . 'V7/index');
    }

    public function deletePicture($id)
    {
        $MyndaEdit = new Mynd();
        $MyndaEdit->deletePic($id);
        header('location: ' . URL . 'V7/adminSight');
    }
    public function updateName()
    {
        $UserEdit = new UserEdit();
        $UserEdit->EditName();
        header('location: ' . URL . 'V7/adminSight');
    }
}
