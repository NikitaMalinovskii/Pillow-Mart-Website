<?php

class DBController
{

    // Database connection properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'fashi';

    // Connection property
    public $connection = null;

    // Call constructor
    public function __construct()
    {
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );
        if ($this->connection->connect_error) {
            echo 'Fail' . $this->connection->connect_error;
        };

        // echo 'success connection';
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // Close connection
    protected function closeConnection()
    {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;
        }
    }
}
