<?php
static $error;
static $title;
static $summary;
static $content;

$title   = (isset($_POST['title'])) ? $_POST['title'] : "";
$summary = (isset($_POST['summary'])) ? $_POST['summary'] : "";
$content = (isset($_POST['content'])) ? $_POST['content'] : "";

if(!$_SESSION['username']) header("Location: /blogs/");
if(isset($_POST['add_blog'])) {
   $db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
   include("classes/blog.php");
   $ab = new blog($db);
   $ab->add_blog();

   if($ab->message) {
       $error = '<div id="error">' . $ab->message . '</div>';  
      } else {
     header("Location: /blogs/");
  }

}


?>