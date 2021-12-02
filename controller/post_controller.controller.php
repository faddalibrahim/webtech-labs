<?php

    require __DIR__."/../model/post.model.php";

    class PostController extends Post{
        public function getAllItems(){
            $results = $this->fetchAllItems();
            print_r($results);
        }

    }



?>