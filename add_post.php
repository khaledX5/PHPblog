<?php include_once('./resource/init.php');
if(isset($_POST['title'],$_POST['contents'],$_POST['category'])){
    $errors=array();
    $title=  trim($_POST['title']);
    $contents=  trim($_POST['contents']);
    if(empty($title)){
        $errors[]="you need to add Title ..please";
    }
    if(empty($contents)){
        $errors[]="you need to add Contents ..please";
        
    }
    if(!category_exist('id',$_POST['category'])){
        $errors[]="no categories ..";
    }
    if (strlen($title)>255) {
        $errors[]=" title more than 255 char";
    }
    if(empty($errors)){
        add_post($title,$contents,$_POST['category']);
        $id=  mysql_insert_id();
        header("location: index.php?id=$id");
        die();
        
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Post</title>
        <style>
            label{
                display: block;
            }
        </style>
        <link rel="stylesheet"href="css/bootstrap.css">
	<link rel="stylesheet"href="css/my-bootstrap.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Add Post</h1>
        <?php 
        if(isset($errors) && !empty($errors)){
            echo "<ul  class='list-group'><li class='list-group-item list-group-item-danger'>",  implode("</li><li class='list-group-item list-group-item-danger'>", $errors),"</li></ul>";
        }
        ?>
        <form action="" method="post">
            <div>
                <label for='title'>title</label>
                <input type='text' name='title' value="<?php if(isset($_POST['title'])){
     echo $_POST['title'];
                 } ?>"/>
            </div>
            <div>
                <label for='contents'>Contents</label>
                <textarea name="contents" rows="15" cols="50"><?php if(isset($_POST['contents'])){
     echo $_POST['contents'];
                } ?></textarea>    
               </div>
               <div>
                <label for='category'>Category</label>
                <select name="category">
               <?php 
               foreach (get_categories() as $category){
                   ?>
                <option value="<?php echo $category['id']; ?>"> <?php echo $category['name'];?></option>
                <?php
               }
               ?>
                </select>
               </div>
            <div>
                <input type='submit'  value="add Post"/>
            </div>
               
        </form>
    </body>
</html>