<?php

    if(isset($_GET['id'])){
        $id = $_GET['id']; 

        if(!is_numeric($id)){
            header("Location: my_form.php");
        }       
    }

    if(isset($_POST['id'])){
        require __DIR__."/controller/post_controller.controller.php";
        $posts = new PostController();

        $id = $_POST['id']; 
        $update = $_POST['update'];

        $results = $posts->updateItem($update,$id);

        if($results){
            header("Location: my_form.php");
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