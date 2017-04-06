<?php


namespace Mini\Model;

use Mini\Core\Model;

class UserEdit extends Model
{
    public function addUser($nafn, $pass, $email)
    {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO notandi(nafn, adgangsord, netfang)  VALUES (:nafn, :pass, :email )";
        $query = $this->db->prepare($sql);
        $parameters = array(':pass' => $hashedPass, ':nafn' => $nafn, ':email' => $email);
        $query->execute($parameters);
    }
    public function login()
    {
        if (!isset($_SESSION['authenticatedID'])) {
            if (isset($_POST["login"])) {
            $sql = "select id, nafn, adgangsord, admin FROM notandi where nafn = :nafn LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':nafn' => $_POST["username"]);
            $query->execute($parameters);
            $user = $query->fetch();
            if (isset($user->nafn)) {
                if (password_verify($_POST["password"],$user->adgangsord)) {
                    session_start();
                    $_SESSION['authenticatedID'] = $user->id;
                    $_SESSION['start'] = time();
                    $_SESSION['adminBool'] = $user->admin;
                }
            }
        }
        }

        if (isset($_SESSION['adminBool'])&&isset($_SESSION['authenticatedID'])&&isset($_SESSION['start'])) {
            if ($_SESSION['start']<time()+(60*30)) 
            {
                if ($_SESSION['adminBool']==1) {
                     return ["admin",$user,$_SESSION['authenticatedID'],$_SESSION['start'],$_SESSION['adminBool']];
                 } 
                 else{
                    return ["normal",$user,$_SESSION['authenticatedID'],$_SESSION['start'],$_SESSION['adminBool']];
                 }
            }
            else{
                session_destroy();
                /*header('location: ' . URL . 'V7/index');*/
                return ["no","kek"];
            }
        }
        else{
            return ["no","kek"];
        }
    }
    public function getAllUsers()
    {
        $sql = "select nafn, netfang from notandi";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function EditName()
    {
        if (isset($_POST["newName"])) {
            $sql = "UPDATE notandi SET nafn = :nafn WHERE id = :user_ID";
            $query = $this->db->prepare($sql);
            $parameters = array(':nafn' => $_POST["newName"], ':user_ID' =>  $_POST["update"]);
            $query->execute($parameters);
        }
        else{
            echo "new name not set";
            echo $_SESSION['authenticatedID'];
        }
    }
}
