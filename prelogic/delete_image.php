<?
include("classes/gallery.php");
$gallery = new gallery;
$delete_image = $gallery->delete_image();

header("Location: /edit_gallery/" . $_GET['param2'] . "/");
exit;

?>