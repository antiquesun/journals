<?php
include_once("includes/mysql.php");
include_once("classes/gallery.php");


if(isset($_POST['Gallery_id']) && isset($_POST['add_comment'])) {

  $ac = new gallery;
  $ac->add_comment();

  if($ac->message) {
    $error = '<div id="error">' . $ac->message . '</div>';  
   } else {
    header("Location: /gallery/" . $_POST['Gallery_id'] . "/");
  }


}
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$thegallery = new gallery($db);
$thegallery_content = $thegallery->get_gallery_contents();
$gallery_info = $thegallery->get_gallery_info();
$gallery_comments = $thegallery->get_comments();

if($gallery_comments) {
  $comments = '<div id="comment-block-title">Comments</div>';
  while($res = $gallery_comments->fetch_array()) {
    $title = $res['title'];
    $author = $res['author'];
    $comment = $res['comment'];
    $comment_created = date("F j, Y", strtotime($res['created']));
    $user    = ($author) ? $author: $res['username'];

    $comments .= '<div id="comment-block"><div class="comment-title">' .  $title . '</div> <div class="comment-desc">submitted by ' . $user . ' on ' . $comment_created . '</div><div class="comment">' . $comment . '</div></div>';
  }

}

?>