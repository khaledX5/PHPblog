<?php 
include_once ('./resource/init.php');
if(isset($_POST['name']))
{
    $name=  trim($_POST['name']);
    if(empty($name)){
       $error="please insert name."; 
    }elseif (category_exist('name',$name)) {
               $error="category  exist.. try again"; 
               
    }elseif (strlen($name)>24) {
        $error=" more than 24 chr";
    }
if(!isset($error)){
add_cat($name);    
}


}
?>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Add a Category</title>

    </head>
    <body>
        <h1>Add Categorey</h1>
        <?php 
if(isset($error)){
    echo "<p> [$error] </p>\n";    
    
}
?>
        <form action="" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="" />
            </div>
            <div>
                <input type="submit" value="Add Category" />
            </div>
            
        </form>
    </body>
</html>