<?php
    require "database_connection_test.php";

    session_start();

    $result = null;
    $no_result = null;

    if(isset($_GET['search'])){
        $keyword = $_GET['search'];
        $_SESSION['keyword'] = $keyword;


        $sql = "SELECT * FROM practical_lab_table WHERE `search_term` LIKE '%$keyword%'";
        $result = $connection->query($sql);

        $no_result = "No results found";

    }

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
<style>
    
    

    
</style>
<body>

    <!-- Add Form -->
    <form method="GET" action="results_page.php">
        <h1>Add</h1>
        <input type="text" placeholder="add.." name="search">
        <input type="submit" value="add"/>
    </form>

    <!-- Search Form -->
    <form method="GET" action="my_form.php">
        <h1>Search</h1>
        <input type="text" placeholder="search.." name="search" value="<?php echo $_SESSION['keyword'] ?? "" ?>">
        <input type="submit" value="search"/>
    </form>

    <!-- Search Results -->
    <div class="search-results">
        <?php if($result !== null && $result->num_rows): ?>
        <table>
            <caption style="color: #aaa; text-align: left">Search Results( <?php echo $result->num_rows?> )</caption><br>
            <?php while($row = $result->fetch_assoc()): ?>
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
                        echo $no_result;
                    ?>
                </h1>
            <?php endif; ?>
    </div>  
</body>
</html>