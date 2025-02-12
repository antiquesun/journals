<?php

$blogs = NULL;
include_once("includes/mysql.php");
include_once("classes/blog.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$blog_content = new blog($db);

$blogs = $blog_content->get_blogs();


?>