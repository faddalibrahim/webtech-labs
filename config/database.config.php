<?php

    require __DIR__."/credentials.config.php";

    class Database{
        private $server_name = SERVER_NAME;
        private $user_name = USER_NAME;
        private $password = PASSWORD;
        private $db_name = DB_NAME;
        private $connection;
        
        public function connect(){
            $this->connection = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
            
            if(!$this->connection){
                die("Database connection failed: " . $this->db->connect_error);
            }
            
            return $this->connection;
        }
    }


?>