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
    /*in progress replacement
    DELIMITER ☺
CREATE PROCEDURE fetchPosts (IN post_id INT, IN User_id INT)
BEGIN 
create TEMPORARY table TempVotes as select * from Votes where U_id=User_id;
        select Post.P_title, Post.P_url, Post.P_upp, Post.P_id, Votes.V_value , Votes.U_id
        from Post 
        left join TempVotes on Post.P_id=TempVotes.P_id
        where Post.P_id < post_id
        ORDER BY Post.P_id DESC 
        limit 8;
END; ☺
 DELIMITER ;


*/

    /*public function Voting($postID, $userID, $was, $is)
    {
        if ($was==$is) 
        {
            echo "nonononono";
        }
        else if($was=="0")                      //select * from Post join Votes on Post.P_id=Votes.P_id 
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
}
