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
    public function authenticate($nafn, $passi)
    {
        if (isset($nafn)&&isset($passi)) {
            $sql = "select U_id, U_name, U_password FROM Usor where U_name = :name LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':name' => $nafn);
            $query->execute($parameters);
            $user = $query->fetch();
            if (isset($user->U_name)) {//does exsist?
                if (password_verify($passi,$user->U_password)) {
                    if(session_status() == PHP_SESSION_NONE) session_start();
                    $_SESSION['authenticatedID'] = $user->U_id;
                    $_SESSION['username'] = $user->U_name;
                    //$_SESSION['start'] = time(); er ekki að fíla timelimit
                    $_SESSION['adminBool'] = $user->admin;
                }
            }
        }
        else{
            return false;
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
