<?php

    require __DIR__."/../model/upload.model.php";

    class UploadController extends Upload{
        public function getAllImages(){
            $results = $this->fetchAllImages();
            return $results;
        }

      
    }



?>