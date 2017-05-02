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
        $sql = "select MAX(P_id)+1 from Post";//byrjar á 0 í javascript fileinu
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
        $sql = "select P_title, P_url, P_upp, P_id from Post where P_id < :range ORDER BY P_id DESC limit 15;";//byrjar á 0 í javascript fileinu
        $query = $this->db->prepare($sql);
        $parameters = array(':range' => $range);
        $query->execute($parameters);
        return $query->fetchAll();
    }

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
}
