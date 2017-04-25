<?php


namespace Mini\Model;

use Mini\Core\Model;

class Admin extends Model//admin only commands
{

    /*to do
        ♦can delite any user
        ♦can remove any post
        ?leave a message for anyone?
    */
    public function getAllUsers()
    {
        $sql = "select nafn, netfang from notandi";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
