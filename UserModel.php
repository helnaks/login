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

    /**
     * Validate user
     *
     * @param array $data
     * @return void
     */
    function validateUser(array $data)
    {
        $sql = "SELECT id, email, password FROM user WHERE email = '" . $data['email'] . "'";
       
        $result = mysqli_query($this->dbConnection->connection, $sql);  
            
        if (mysqli_num_rows($result) == 1) {
            $userData = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (password_verify($data['password'], $userData['password'])) {
                return $userData['id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Check for existing email id
     *
     * @param string $email
     * @return bool
     */
    function validteEmail(string $email) {
        $sql = "SELECT id FROM user WHERE email = '" . $email . "'";
       
        $result = mysqli_query($this->dbConnection->connection, $sql);  
            
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}