<?php
class Connection
{  
    function __construct()
	{
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbname = 'login';

		$this->connection = mysqli_connect($servername, $username, $password, $dbname);
        if ($this->connection->connect_error) {
			die ('Failed to connect' . $this->connection->connect_error); 
        }

        return $this->connection;  
    }  
	
    public function CloseConnection($connection)
	{  
        mysqli_close($connection);
    }
} 