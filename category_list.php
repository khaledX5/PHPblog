<?php include_once('./resource/init.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Category LIST</title>

    </head>
    <body>
<?php 
foreach (get_categories() as $category) {
    ?>
        <p>    <a href="category.php?id=<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></a>  
            -<a href="delete_category.php?id=<?php echo $category["id"]; ?>">Delete</a>
        </p>
        
        <?php
    }

?>
    </body>
</html>