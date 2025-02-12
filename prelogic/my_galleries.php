<?php
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
static $gallery_list;

$galleries = NULL;
include_once("classes/gallery.php");
$mygallery = new Gallery($db);

$galleries = $mygallery->my_galleries();


?>