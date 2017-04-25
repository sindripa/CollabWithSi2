<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Login;

class HomeController
{

    public function index()
    {
        if(session_status() == PHP_SESSION_NONE) session_start();
        if (isset($_SESSION['authenticatedID'])) {
            header('location:'. URL.'Nonegag/index' );
        }
        $LoginModel = new Login();
        $error = [];
        if (isset($_POST["innskra"])) {
            
            if(!empty($_POST['username']) && !empty($_POST['password'])){       
                /* Veit ekki alveg með þetta
                if(session_status() == PHP_SESSION_NONE) session_start();
                
                $_SESSION['username'] = $_POST['username'];*/
                
                if ($LoginModel->authenticate($_POST['username'],$_POST['password'])) {
                    header('location:'. URL.'Nonegag/index' );
                }
                else {
                        // þarf að útfæra betur
                        array_push($error, "Wront password or username");
                }

            } else {
                    // þarf að útfæra betur
                    array_push($error,"Require username and password");
            }

        }
        if (isset($_POST["create"])) {
            if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["confpass"])) {
                if ($_POST["password"]!=$_POST["confpass"]) {//did he do right?
                    array_push($error,"pls conferm password");
                }
                $LoginModel->addUser($_POST["username"], $_POST["password"], $_POST["email"]);
                echo "user added";
            }
        }

            // load views
            if (!empty($error)) {
                print_r($error);
            }
            require APP . 'view/home/sign_up.php';
            require APP . 'view/home/login.php';
        
    }
}
