<?php

namespace CRUD\Helper;

use Exception;
use mysqli;

class DBConnector
{

    /** @var mysqli $db */
    private $db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = 'Moheb.moallem73';
        $schema = 'person_schema';
        $this->db = mysqli_connect($servername, $username, $password,$schema);
        if (!$this->db){
            throw new Exception("some thing is wrong");
        }
    }

    /**
     * @return false|mysqli|null
     */
    public function getDb()
    {
        return $this->db;
    }


    /**
     * @throws Exception
     * @return void
     */
    public function connect() : void
    {

    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) : bool
    {

        return true;
    }

    /**
     * @param string $message
     * @throws Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {

    }
}