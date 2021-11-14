<?php 

    require 'my_add_functions.php';
    include 'other_functions.php';


    $sum = add(200,189);


    $result = multiply(3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        font-family: "Google Sans", sans-serif;
    }
</style>
<body>
    <h1>Sum : <?php echo $sum ?></h1>
    <h1>Multiply : <?php echo $result ?></h1>
</body>
</html>