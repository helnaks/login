<?php

class UserModel
{
    function __construct() {
        require_once 'Connection.php';
        $this->dbConnection = new Connection();
    }

    /**
     * Insert data into User
     *
     * @param array $formData
     * @return void
     */
    function insert(array $formData)
    {
        $fields = array_keys($formData);
       
        $sql = "INSERT INTO user (`" . implode('`,`', $fields) . "`)
        VALUES('" . implode("','", $formData). "')";

        return mysqli_query($this->dbConnection->connection, $sql);
    }
}