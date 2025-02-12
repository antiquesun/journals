<?
include("classes/video.class.php");
$vid = new Video;
$delete_video = $vid->delete_video();

header("Location: /my_videos/");
exit;

?>