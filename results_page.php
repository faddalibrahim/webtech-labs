<?php

require "database_connection_test.php";

    if(isset($_GET['search'])){
        $keyword = $_GET['search'];

        $sql = "INSERT INTO practical_lab_table(search_term) VALUES('$keyword')";

        if($connection->query($sql) === TRUE){
            echo "$keyword has been added to the database";
        }
        else{
            echo $connection->error;
        }
    }

?>