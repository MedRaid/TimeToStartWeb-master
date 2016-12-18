<?php
class DB_CONNECT {
    private $conn;
    function __construct() {
        $this->connect();
        //echo "connected succesfully";
    }

    function __destruct() {
        $this->close();
    }

    function connect() {
        include_once  'db_config.php';

        if($this->conn == null){
         $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) 
                          or die(mysqli_error());
        }		

           if($this->conn){
        //echo "connected succesfully";
		}
		return $this->conn; 
    }

    function close() {
        mysqli_close($this->conn);
		//echo "closed successfully";
    }
}
?>