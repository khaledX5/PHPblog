<?php 

function add_post($title,$content,$category){
	    $title=  mysql_real_escape_string($title);
            $content=  mysql_real_escape_string($content);
            $category =(int)$category;
            mysql_query("INSERT INTO post(cat_id,title,content,date_posted) VALUES ($category,'{$title}','{$content}',NOW())");    
                echo mysql_error();

}
function edit_post($id,$title,$content,$category){
	
}

function add_cat($name){
    $name=  mysql_real_escape_string($name);
    mysql_query("INSERT INTO categories(name) VALUES ('{$name}')");
}
function delete($field,$id){
    $field=  mysql_real_escape_string($field);
    $id=(int)$id;
    mysql_query("DELETE FROM $field WHERE id='$id'");
}
function get_posts($id=null ,$cat_id=null){
        $posts=array();
        $query=  "SELECT post.id As post_id,cat_id,title,content,date_posted ,categories.name FROM post INNER JOIN categories On categories.id=post.cat_id  ";
        if(isset($id)){
        $id=(int)$id;
        $query.="WHERE post.id=$id ";

        }
        $query.=" ORDER BY post.id DESC";
        $query=mysql_query($query);
        echo mysql_error();
        while($row =  mysql_fetch_assoc($query)){
                $posts[]=$row;
        }
           
        return $posts;
}
function get_categories($id=null){
	$categories = array();
        $query=  mysql_query("SELECT id,name FROM categories");
        while ($row= mysql_fetch_assoc($query)){
            $categories[] = $row;
        }
        return $categories ;
}
function category_exist($name,$value){
	$name=  mysql_real_escape_string($name);      
	$value=  mysql_real_escape_string($value);      

        $sql=mysql_query("SELECT * FROM categories WHERE $name='{$value}'");
        echo mysql_error();
        if(mysql_num_rows($sql)>=1)
   {
     return TRUE;
   }  else {
   return false ;    
   }
   
}