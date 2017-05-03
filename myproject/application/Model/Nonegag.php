<?php


namespace Mini\Model;

use Mini\Core\Model;

class Nonegag extends Model
{

    /*to Do:
        ♦delite account (only yours)
        ♦delite post(only yours)
        ♦eddit other stuff like password and username
        ♦upload post
    */
    public function TopId()
    {
<<<<<<< HEAD
        $sql = "select MAX(P_id)+1 from Post";//byrjar á 0 í javascript fileinu
=======
        $sql = "select MAX(P_id)+1 as fuck from Post";//byrjar á 0 í javascript fileinu
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
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
<<<<<<< HEAD
        $sql = "select P_title, P_url, P_upp, P_id from Post where P_id < :range ORDER BY P_id DESC limit 15;";//byrjar á 0 í javascript fileinu
=======
        $sql = "select P_title, P_url, P_upp, P_id from Post where P_id < :range ORDER BY P_id DESC limit 8;";//byrjar á 0 í javascript fileinu
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
        $query = $this->db->prepare($sql);
        $parameters = array(':range' => $range);
        $query->execute($parameters);
        return $query->fetchAll();
    }

<<<<<<< HEAD
    public function Voting($postID, $userID, $was, $is)
    {
        if ($was==$is) {
            echo "nonononono";
        }
        else{
            if ($was=="0"&&$is=="1") {//upvote from nuteral
                $sql = "insert";
            }
            else if ($was=="0"&&$is=="-1") {//downvote
                $sql = "UPDATE notandi SET nafn = :nafn WHERE id = :user_ID";
            }
        }
    }
=======
    /*public function Voting($postID, $userID, $was, $is)
    {
        if ($was==$is) 
        {
            echo "nonononono";
        }
        else if($was=="0")
        {//from nautral
            if ($is=="1") 
            {
                $sql = "UPDATE Post SET P_upp=(SELECT P_upp+1 WHERE P_id=1) WHERE P_id=1;";
            }
            else if ($is=="-1") 
            {
                $sql = "UPDATE Post SET P_upp=(SELECT P_upp-1 WHERE P_id=1) WHERE P_id=1;"
            }
        }
    }*/
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
}
