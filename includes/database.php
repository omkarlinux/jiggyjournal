<?php
    class Connection{
        // Database connection setup
		private $serverName = "mysql13.000webhost.com";
		private $database = "a2354647_journal";
		private $user_name = "a2354647_journal";
		private $pass_word = "njoys6900";
        
        private $link;
        private $result;
        
        function __construct($serverName="",$database=""){
            if (!empty($serverName)){ $this->serverName = $serverName; }
            if (!empty($database)){ $this->database = $database; }
            //Create connection object
            $this->link = new mysqli($serverName, $username, $password, $database);
            
            // Check connection
            if ($this->link->connect_error)
            {
                return false;
            }
            return $this->link;  // returns false if connection could not be made.
        }

        function query($sql){
            if (!empty($sql)){
                    $this->result = mysqli_query($this->link,$sql);
                    return $this->result;
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