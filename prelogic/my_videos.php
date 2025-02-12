<?php
include_once("classes/video.class.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$vids = new Video($db);
static $video_content;
$video_content = $vids->my_videos();



?>
