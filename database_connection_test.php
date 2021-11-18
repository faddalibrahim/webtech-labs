<?php

require __DIR__."/database_credentials.php";

$connection = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DB_NAME);

if(!$connection){
    die("Connection failed: " . $connection->connect_error);
}




?>