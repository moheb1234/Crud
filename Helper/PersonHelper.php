<?php

namespace CRUD\Helper;

use mysqli;

class PersonHelper
{
    private mysqli $db;

    /**
     * @param DBConnector $db
     */
    public function __construct(DBConnector $db)
    {
        $this->db = $db->getDb();
    }

    public function insert($firstname, $lastname, $username): bool
    {
        $query = "INSERT INTO person
               (firstname, lastname, username)
           VALUES
             ('$firstname', '$lastname', '$username')";
        if ($this->db->query($query))
            return true;
        return false;
    }

    public function fetch(int $id)
    {
        $query = "select * from person where id = $id";
        $result = $this->db->query($query);
        if ($result) {
            return json_encode($result->fetch_assoc());
        }
        return null;
    }

    public function fetchAll()
    {
        $query = "select * from person ";
        $result = $this->db->query($query)->fetch_all();
        if ($result) {
            return json_encode($result);
        }
        return null;
    }

    public function update($firstname, $lastname, $username): bool
    {
        $query = "UPDATE person
                  SET firstname = '$firstname' , lastname = '$lastname' , username = '$username'
                   WHERE username = '$username'";
        if ($this->db->query($query))
            return true;
        return false;
    }

    public function delete($username): bool
    {
        $query = "delete from person where username = '$username'";
        if ($this->db->query($query))
            return true;
        return false;
    }

    public function closeConnection()
    {
        $this->db->close();
    }
}