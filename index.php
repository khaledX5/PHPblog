<?php include_once('./resource/init.php');
$posts=(isset($_GET['id']))?get_posts($_GET['id']):get_posts();
?>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            li{display: inline;margin-right: 20px;}
            ul{list-style-type: none;}
            
        </style> 
        <title>Category LIST</title>
	<link rel="stylesheet"href="css/bootstrap.css">
	<link rel="stylesheet"href="css/my-bootstrap.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <div>
            
<ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active">  <a   href="index.php">Home</a></li>
            <li role="presentation">  <a  href="category_list.php">Category _list</a></li>
            <li role="presentation"> <a  href="add_category.php">Add category</a></li>
            <li role="presentation"> <a  href="add_post.php">Add post</a></li>
        </ul>
        </div>
  <?php 
        foreach ($posts as $post) {
            if(! category_exist('name',$post['name'])){

                }
 ?>
        <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">

        <h2><a href="index.php?id=<?php echo $post['post_id'];?>"><?php echo $post['title']; ?></a></h2>

        <h6>posted in <?php echo $post['date_posted'];?></h6>
        this post at Category>> <a href="category.php?id=<?php echo $post['cat_id']; ?>"><?php echo $post['name']; ?></a>
        <p><?php echo $post['content'];?> </p>
  </div>
    </div>
  </div>
</div>        
            <?php 
        
                }
  ?>      
    </body>
</html>