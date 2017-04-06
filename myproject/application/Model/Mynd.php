<?php
namespace Mini\Model;

use Mini\Core\Model;

class Mynd extends Model
{

    public function listPics()//sækir titil og id allra mynda, eftir stafrósröð
    {
        $sql = 'SELECT id, myndHeiti FROM myndir order by myndHeiti';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllInfo()//sækir titil og id allra mynda, eftir stafrósröð
    {
        $sql = 'SELECT id, skraarHeiti as PicUrl, myndHeiti as name, textaLysing as discription FROM myndir order by myndHeiti';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function PicByID($id)
    {
        $sql = 'SELECT skraarHeiti as PicUrl, myndHeiti as name, textaLysing as discription FROM myndir where id = :ID';
        $query = $this->db->prepare($sql);
        $parameters = array(':ID' => $id);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function PicByUser($id)
    {
        $sql = 'SELECT skraarHeiti as PicUrl, myndHeiti as name, textaLysing as discription FROM myndir where notandaID = :ID';
        $query = $this->db->prepare($sql);
        $parameters = array(':ID' => $id);
        $query->execute($parameters);

        return $query->fetchAll();
    }


    public function listUsers()//sækir nafn og id allra usera
    {
        $sql = "SELECT nafn, id FROM notandi";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function UserById($notandaID)//sækri allar myndir frá áhveðnum user
    {
        $sql = 'SELECT notandi.nafn as nafn, myndir.myndHeiti as heiti,myndir.id as id FROM notandi JOIN myndir on notandi.id = myndir.notandaID where notandi.id = :ID';
        $query = $this->db->prepare($sql);
        $parameters = array(':ID' => $notandaID);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function countID()//telur fjöldi mynda
    {
        $sql = "SELECT count(id) as 'fjoldi' FROM myndir";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->fjoldi;
    }

    public function searchPic($input)
    {
        $sql = 'SELECT id, myndHeiti FROM myndir where myndHeiti like :name';
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => '%'.$input.'%');
        $query->execute($parameters);

        return $query->fetchAll();
    }


    public function deletePic($id)
    {
        $sql = "DELETE FROM myndir WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
    }

}