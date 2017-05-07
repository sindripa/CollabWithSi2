<?php


namespace Mini\Model;

use Mini\Core\Model;

class NoneGag extends Model
{

    /*to Do:
        ♦delite account (only yours)
        ♦delite post(only yours)
        ♦eddit other stuff like password and username
        ♦upload post
    */
    public function TopId()
    {
        $sql = "select MAX(P_id)+1 as fuck from Post";//byrjar á 0 í javascript fileinu
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    public function EditName()//beita nafni
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

    public function getPost($range)
    {
        if(session_status() == PHP_SESSION_NONE) session_start();
        $sql = " call fetchPosts(:range,:id);";//byrjar á 0 í javascript fileinu
        $query = $this->db->prepare($sql);
        $parameters = array(':range' => $range, ':id' => $_SESSION['authenticatedID']);
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function getOnePost($range)
    {
        if(session_status() == PHP_SESSION_NONE) session_start();
        $sql = "select ";//byrjar á 0 í javascript fileinu
        $query = $this->db->prepare($sql);
        $parameters = array(':range' => $range, ':id' => $_SESSION['authenticatedID']);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function Voting($postID, $operation)
    {
        if(session_status() == PHP_SESSION_NONE) session_start();
        if ($operation=="delete") {
            $sql = "DELETE FROM Votes where U_id=:User_id and P_id = :Post_id;";    
        }
        else if ($operation =="updateGoo") {
            $sql = "update Votes set V_value = 1 where U_id = :User_id and P_id = :Post_id";  
        }
        else if ($operation == "updateBad") {
            $sql = "update Votes set V_value = -1 where U_id = :User_id and P_id = :Post_id"; 
<<<<<<< HEAD
        }
        else if ($operation == "createGoo") {
            $sql = "insert into Votes(V_value, U_id, P_id) values (1, :User_id, :Post_id)";
        }
=======
        }
        else if ($operation == "createGoo") {
            $sql = "insert into Votes(V_value, U_id, P_id) values (1, :User_id, :Post_id)";
        }
>>>>>>> 7689520f99a0106bb3b5c5ccb6133b0117bc9095
        else if ($operation == "createBad") {
            $sql = "insert into Votes(V_value, U_id, P_id) values (-1, :User_id, :Post_id)";
        }
        else{echo "shit";}
        $query = $this->db->prepare($sql);
        $parameters = array(':Post_id' => $postID, ':User_id' => $_SESSION['authenticatedID']);
        $query->execute($parameters);
    }
}
