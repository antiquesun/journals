<?php
include_once("classes/blog.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$blog = new blog($db);
static $blog_content;
static $error;

if(isset($_POST['edit_blog']) && $_SESSION['aid'] == $_POST['aid']) {
   $blog->save_blog();
 }


$blog_content = $blog->get_blog_contents();

?>