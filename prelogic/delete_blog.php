<?
include("classes/blog.php");
$blog = new blog;
$delete_blog = $blog->delete_blog();

header("Location: /my_blogs/");
exit;

?>