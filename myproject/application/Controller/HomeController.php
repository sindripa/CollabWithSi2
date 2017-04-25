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

class HomeController
{

    public function index()
    {
        $LoginModel = new NoneGag();
        $error = [];
        if (isset($_POST["nyskra"])) {
            
            if(!empty($_POST['username']) && !empty($_POST['password'])){       
                /* Veit ekki alveg með þetta
                if(session_status() == PHP_SESSION_NONE) session_start();
                
                $_SESSION['username'] = $_POST['username'];*/
                
                if ($LoginModel->authenticate($_POST['username'],$_POST['password'])) {
                    header('location:'. URL.'admin/index' );
                }
                else {
                        // þarf að útfæra betur
                        $error = "Wront password or username";
                }

            } else {
                    // þarf að útfæra betur
                    array_push($error,"Require username and password");
            }

        }
        if (isset($_POST["create"])) {
            if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["confpass"])) {
                if ($_POST["password"]==$_POST["confpass"]) {//did he do right?
                    # code...
                }
                else{array_push($error,"pls conferm password")}
            }
        }

            // load views
            require APP . 'view/_templates/header.php';
            print_r($error);
            require APP . 'view/home/sign_up.php';
            require APP . 'view/home/login.php';
            require APP . 'view/_templates/footer.php';
        
    }
}
