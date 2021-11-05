<?php
    require "database_connection_test.php";

    if(isset($_GET['id'])){
        $id = $_GET['id']; 

        if(!is_numeric($id)){
            header("Location: my_form.php");
        }
         
    }


    if(isset($_POST['id'])){
        $id = $_POST['id']; 
        $update = $_POST['update'];

        $sql = "UPDATE practical_lab_table SET search_term='$update' WHERE lab_id='$id'";

        if ($connection->query($sql) === TRUE) {
            header("Location: my_form.php");
        } 
        else {
            die("Error updating record: " . $connection->error);
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="edit_form.php" method="post">
    <input type="text" name="update" placeholder="enter update"/>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="submit" value="update">
</form>
    
</body>
</html>