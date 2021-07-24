<?php


class DbController
{
//    Db Connection
    protected string $host = 'remotemysql.com:3306';
    protected string $user = '71KTNkPSjz';
    protected string $password = 'SkoHE3PSo4';
    protected string $database = '71KTNkPSjz';


    public mysqli|null|false $con;

//  Constructor for DB

    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if ($this->con->connect_error) {
            echo "Fail" . $this->con->connect_error;
        }


    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection(): void
    {
        if ($this->con !== null) {
            $this->con->close();
            $this->con = null;
        }
    }

}
