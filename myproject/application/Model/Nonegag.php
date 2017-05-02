<?php


namespace Mini\Model;

use Mini\Core\Model;

class Nonegag extends Model
{

    /*to Do:
        !!♥LOAD CREATE JSON FILE FOR AJAX COMMANDS♥!!
        ♦delite account (only yours)
        ♦delite post(only yours)
        ♦eddit other stuff like password and username
        ♦upload post
    */
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
        $kek = $range+15;
        $sql = "select P_title, P_url, P_upp, P_id from Post where P_id > :lower and P_id < :higher";//byrjar á 0 í javascript fileinu
        $query = $this->db->prepare($sql);
        $parameters = array(':lower' => $range, ':higher' => $kek);
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
