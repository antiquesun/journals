<?php
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
static $blogs = NULL;

include_once("classes/blog.php");
$myblogs = new blog($db);

$blogs = $myblogs->my_blogs();


?>