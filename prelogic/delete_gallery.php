<?
include("classes/gallery.php");
$blog = new gallery;
$delete_gallery = $blog->delete_gallery();

header("Location: /my_galleries/");
exit;

?>