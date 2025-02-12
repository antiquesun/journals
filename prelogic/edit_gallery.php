<?php
include_once("classes/gallery.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$thegallery = new gallery($db);
static $gallery_comments;
static $gallery_info;

if(isset($_POST['submit']) && $_POST['submit'] == "Submit Changes") {

  $thegallery->update_gallery();

  if($thegallery->message) {
    $error = '<div id="error">' . $thegallery->message . '</div>';  
   } else {
    header("Location: /edit_gallery/" . $_POST['gallery'] . "/");
  }


}


$thegallery_content = $thegallery->get_gallery_contents();
$gallery_info = $thegallery->get_gallery_info();
$gallery_comments = $thegallery->get_comments();

if($gallery_comments) {
  $comments = '<div id="comment-block-title">Comments</div>';
  while($res = $gallery_comments->fetch_array()) {
    $title = $res['title'];
    $comment = $res['comment'];
    $comment_created = date("F j, Y", strtotime($res['created']));
    $user = $res['username'];

    $comments .= '<div id="comment-block"><div class="comment-title">' .  $title . '</div> <div class="comment-desc">submitted by ' . $user . ' on ' . $comment_created . '</div><div class="comment">' . $comment . '</div></div>';
  }

}

?>