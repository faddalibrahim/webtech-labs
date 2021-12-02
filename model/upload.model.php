<?php

    require __DIR__."/../config/database.config.php";

    class Upload extends Database{
        private $table_name = "practical_upload_table";

        public function fetchAllImages(){
            $sql = "SELECT * FROM $this->table_name";
            $result_object = $this->connect()->query($sql);

            return $result_object;
        }

    }



?>