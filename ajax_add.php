<?php

require "database_connection_test.php";

if(isset($_POST['data'])){
    $keyword = $_POST['data'];
      // regex check
    if(!preg_match('/^\d+$/',$keyword)){
        die("value must contain only numbers");
    }

    $sql = "INSERT INTO practical_lab_table(search_term) VALUES('$keyword')";

    if($connection->query($sql) === TRUE){
          echo "$keyword has successfully added to database";
    }
    else{
          echo $connection->error;
    }
}



?>