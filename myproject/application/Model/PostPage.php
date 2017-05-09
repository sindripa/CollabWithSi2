<?php


namespace Mini\Model;

use Mini\Core\Model;

class PostPage extends Model
{
    public function getOnePost($id)
    {
        if(session_status() == PHP_SESSION_NONE) session_start();
        $sql = "call fetchPost(:range,:id);";//byrjar á 0 í javascript fileinu
        $query = $this->db->prepare($sql);
        $parameters = array(':range' => $id, ':id' => $_SESSION['authenticatedID']);
        $query->execute($parameters);
        return $query->fetch();
    }
    public function getComments($id)
    {
        $sql = "SELECT C_id, C_txt, C_date, Usor.U_name as 'U_name', Commint.U_id as 'U_id' from Commint left join Usor on Commint.U_id=Usor.U_id where P_id = :id;";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function CommentUpload($postID, $text)
    {
        for ($i = 0; $i < strlen($text); $i++) {
            if ($text[$i] == 'Ü') {//alt+6+6+6
                $text[$i] = ' ';
            }
        }
        if(session_status() == PHP_SESSION_NONE) session_start();
        $sql = 'INSERT INTO Commint(C_txt, U_id, P_id)VALUES(:comment,:userID,:postID)';
        $query = $this->db->prepare($sql);
        $parameters = array(':comment' => $text, ':postID' => $postID, ':userID' => $_SESSION['authenticatedID']);
        $query->execute($parameters);
    }

}
