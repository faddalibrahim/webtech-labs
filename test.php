<?php

require "database_connection_test.php";

if(isset($_POST['data'])){
    $keyword = $_POST['data'];
    $sql = "INSERT INTO practical_lab_table(search_term) VALUES('$keyword')";

     if($connection->query($sql) === TRUE){
            echo "successfully added to database";
    }
    else{
            echo $connection->error;
    }
}



?>