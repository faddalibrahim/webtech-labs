<?php


    require __DIR__."/controller/post_controller.controller.php";

    if(isset($_GET['id'])){
        $id = $_GET['id']; 

        if(!is_numeric($id)){
            header("Location: my_form.php");
        }

        $posts = new PostController();
        $result_object = $posts->deleteItem($id);

        print_r($result_object);

        if ($result_object) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: ";
        }


         
    }
    else{
        header("Location: my_form.php");
    }

?>