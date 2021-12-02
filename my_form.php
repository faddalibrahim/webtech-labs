<?php

    $result_object = null;
    $results_null = null;
    if(isset($_GET['search'])){
        $keyword = $_GET['search'];

        require __DIR__."/controller/post_controller.controller.php";
        $posts = new PostController();
        $result_object = $posts->searchItem($keyword);
        
        $results_null = "No results found";
    }
    
    require __DIR__."/controller/upload.controller.php";
    $upload = new UploadController();
    $images = $upload->getAllImages();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<style></style>
<body>
    <?php while($image = $images->fetch_assoc()): ?>
        <img width="50%" src="<?php echo 'uploaded_files/'.$image['User_image'] ?>"/>
    <?php endwhile; ?>
    <!-- Add Form -->
    <!-- <form method="GET" action="results_page.php" id="addForm">
        <h1>Add</h1>
        <input type="text" placeholder="add.." name="search">
        <input type="submit" value="add" id="addButton"/>
    </form> -->
    <form method="GET" id="addForm">
        <h1>Add</h1>
        <small>Only numbers required!</small><br/>
        <input type="text" placeholder="add.." id="addFieldInput">
        <input type="submit" value="add" id="addButton"/>
        <div style="color: red;display: none" id="error-output-add">invalid input: please, enter only numbers</div>
        <div style="color: green;display: none" id="correct-output-add">valid input</div>
    </form>

    <form action="handle_upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="" style="color: black">
        <input type="submit" value="upload" name ="upload">
    </form>
    
    <!-- Search Form -->
    <form method="GET" action="my_form.php" id="searchForm">
        <h1>Search</h1>
        <input type="text" placeholder="search.." name="search" value="<?php echo $_SESSION['keyword'] ?? "" ?>">
        <input type="submit" value="search"/>
    </form>

    <!-- Search Results -->
    <div class="search-results">
        <?php if($result_object !== null && $result_object->num_rows): ?>
        <table>
            <caption style="color: #aaa; text-align: left">Search Results( <?php echo $result_object->num_rows?> )</caption><br>
            <?php while($row = $result_object->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["search_term"] ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['lab_id']?>">delete</a>
                        <a href="edit_form.php?id=<?php echo $row['lab_id']?>">edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
            <?php else: ?>
                <h1 style="color: tomato">
                    <?php  
                        echo $results_null;
                    ?>
                </h1>
            <?php endif; ?>
    </div>  

    <script>
        //regex
        const addField = document.getElementById("addFieldInput");
        const errorOutputAdd = document.getElementById("error-output-add");
        const correctOutputAdd = document.getElementById("correct-output-add");
        const regex = /^\d+$/;
        
        addField.addEventListener("input",function(e) {

            if(regex.test(e.target.value)){
                correctOutputAdd.style.display = "block";
                errorOutputAdd.style.display = "none";
            }else{
                 correctOutputAdd.style.display = "none";
                errorOutputAdd.style.display = "block";
            }
        })


        // adding to database with ajax 
        const addForm = document.getElementById("addForm");
        addForm.addEventListener("submit", function(e){
            e.preventDefault();
            const addField = document.getElementById("addFieldInput");


            const formData = new FormData();
            formData.append("data", addField.value);


            const url = "ajax_add.php";
            const options = {
                method: 'POST',
                body: formData
            }
            fetch(url,options)
            .then(response => response.text())
            .then(data => {
                addField.value = null;
                alert(data)
            });
        })

       

    </script>
</body>
</html>