<?php
    require "database_connection_test.php";

    if(isset($_GET['id'])){
        $id = $_GET['id']; 

        if(!is_numeric($id)){
            header("Location: my_form.php");
        }

        $sql = "DELETE FROM practical_lab_table WHERE lab_id = '$id'";

        if ($connection->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }


         
    }
    else{
        header("Location: my_form.php");
    }

?>