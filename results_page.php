<?php

    require __DIR__."/controller/post_controller.controller.php";


    if(isset($_GET['add'])){
        $keyword = $_GET['add'];

        $posts = new PostController();

        if($posts->addItem($keyword)){
            echo "$keyword has been added to the database";
        }
        else{
            echo $posts->error;
        }
    }

?>