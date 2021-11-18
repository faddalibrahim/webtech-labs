<?php

    require __DIR__."/../config/database.config.php";

    class Post extends Database{
        private $table_name = "practical_lab_table";
        private $id_column = '';
        private $search_term_column = 'search_term';

        public function fetchAllItems(){
            $sql = "SELECT * FROM practical_lab_table";
            $result_object = $this->connect()->query($sql);

            return $result_object->fetch_all();
        }

        public function addToDatabase($item){
            $sql = "INSERT INTO $this->table_name (search_term) VALUES('$item')";
            return $this->connect()->query($sql);
        }

        public function searchDatabase($keyword){
            $sql = "SELECT * FROM $this->table_name WHERE `search_term` LIKE '%$keyword%'";
            return $this->connect()->query($sql);
        }

        public function deleteFromDatabase($id){
            $sql = "DELETE FROM $this->table_name WHERE lab_id = '$id'";
            return $this->connect()->query($sql);
        }

         public function updateDatabase($update,$id){
            $sql = "UPDATE $this->table_name SET search_term='$update' WHERE lab_id='$id'";
            return $this->connect()->query($sql);
        }

    }



?>