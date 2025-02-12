<?php
include_once("includes/mysql.php");
include_once("classes/video.class.php");

static $error;

if(isset($_POST['Video_id']) && isset($_POST['add_comment'])) {

  $ac = new Video;
  $ac->add_comment();

  if($ac->message) {
    $error = '<div id="error">' . $ac->message . '</div>';  
   } else {
    header("Location: /video/" . $_POST['Video_id'] . "/");
  }


}

$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");

$video = new Video($db);
$video_content = $video->get_video();
$video_comments = $video->get_comments();

if($video_comments) {
  $comments = ' <div id="blog-line">&nbsp;</div><div id="comment-block-title">Comments</div>';
  while($res = $video_comments->fetch_object()) {
    $title = $res->{CR_COMMENTS_TITLE};
    $author  = $res->{CR_COMMENTS_AUTHOR};
    $comment = $res->{CR_COMMENTS_COMMENT};
    $created = date("F j, Y", strtotime($res->{CR_COMMENTS_CREATED}));
    $user    = ($author) ? $author: $res->{CR_USER_ACCOUNT_USERNAME};
    
    $comments .= '<div id="comment-block"><div class="comment-title">' .  $title . '</div> <div class="comment-desc">submitted by ' . $user . ' on ' . $created . '</div><div class="comment">' . $comment . '</div></div>';
  }

}

?>