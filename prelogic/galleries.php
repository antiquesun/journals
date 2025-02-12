<?php
include_once("includes/mysql.php");
include("classes/gallery.php");

$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$gallery = new gallery($db);

$gallery_list = $gallery->galleries();



?>