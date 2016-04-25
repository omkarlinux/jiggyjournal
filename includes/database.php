<?php
    class Connection{
        // Database connection setup
		private $serverName = "localhost";
		private $database = "jiggycom_db";
		private $username = "jiggycom_jiggy";
		private $password = "njoys6900";
        
        private $link;
        private $result;
        
        function __construct($serverName="", $database=""){
            if (!empty($serverName)){ $this->serverName = $serverName; }
            if (!empty($database)){ $this->database = $database; }
            //Create connection object
            $this->link = new mysqli($this->serverName, $this->username, $this->password, $this->database);
        }

        function query($sql){
            if (!empty($sql)){
                    $this->result = mysqli_query($this->link, $sql);
                    return $this->result;
            }
            else{
                    return false;
            }
        }
        
        function isConnectionError(){
            return $this->link->connect_error;
        }
        
        function error(){
            return mysqli_error($this->$link);
        }
        
        function fetch($result=""){
            if (empty($result)){ $result = $this->result; }
            return mysqli_fetch_assoc($result);
        }

        function __destruct(){
            $this->link->close();
        }
    }
?>