<?php

    require __DIR__."/../model/post.model.php";

    class PostController extends Post{
        public function getAllItems(){
            $results = $this->fetchAllItems();
            print_r($results);
        }

        public function addItem($item){
            return $this->addToDatabase($item);
        }

        public function searchItem($keyword){
            return $this->searchDatabase($keyword);
        }

        public function deleteItem($id){
            return $this->deleteFromDatabase($id);
        }

        public function updateItem($update,$id){
            return $this->updateDatabase($update,$id);
        }
    }



?>