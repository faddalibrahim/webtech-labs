<?php
 
require "database_connection_test.php";

if(isset($_POST['upload'])){
    $meta_data = $_FILES['image'];

    $picname = $meta_data['name'];
    $tmpname = $meta_data['tmp_name'];
    $imageSize = $meta_data['size'];

    $sql = "INSERT INTO `practical_upload_table` (User_image) VALUES('$picname')";

    if($connection->query($sql) === TRUE){
        $destination = 'uploaded_files/'.$picname;
        if(move_uploaded_file($tmpname, $destination)){
            echo "$picname has successfully been added to database";
        }
    }
    else{
        echo $connection->error;
    }
}


?>