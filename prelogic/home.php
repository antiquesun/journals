<?php
static $error;
 $db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
 if(isset($_POST['login']) == "1" && $_POST['username'] && $_POST['password']) {
      $l = new Login($db);
      $l->loginuser($_POST['username'],md5($_POST['password']));
      $error = $l->{'error'};
 }
 

$blogs = NULL;


include_once("classes/blog.php");
include_once("classes/gallery.php");
include_once("classes/video.class.php");



$homeblogs     = new blog($db);
$homegalleries = new gallery($db);
$homevideos    = new Video($db);

$blogs     = $homeblogs->home_blogs();
$galleries = $homegalleries->home_galleries();
$videos    = $homevideos->home_videos();

?>