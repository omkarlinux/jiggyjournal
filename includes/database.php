<?php
    class Connection{
        // Database connection setup
		private $serverName = "mysql13.000webhost.com";
		private $database = "a2354647_journal";
		private $username = "a2354647_journal";
		private $password = "njoys6900";
        
        private $link;
        private $result;
        
        function __construct($serverName="", $database=""){
            if (!empty($serverName)){ $this->serverName = $serverName; }
            if (!empty($database)){ $this->database = $database; }
            //Create connection object
            $this->link = new mysqli($this->serverName, $this->username, $this->password, $this->database);
            
            // Check connection
            if ($this->link->connect_error)
            {
                return false;
            }
            return $this->link;  // returns false if connection could not be made.
        }

        function query($sql){
            return $sql;
            if (!empty($sql)){
                    $this->result = mysqli_query($this->link, $sql);
                    return $sql;
            }
            else{
                    return false;
            }
        }

        function fetch($result=""){
            if (empty($result)){ $result = $this->result; }
            return mysqli_fetch_assoc($result);
        }

        function __destruct(){
            $this->link->close();
        }
    }
    
    $connobj = new Connection();
    // Check connection
    if (!$connobj)
    {
        echo "Connection failed: " . $conn->connect_error;
    } 
?>