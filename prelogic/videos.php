<?php
include_once("classes/video.class.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$vids = new Video($db);

$video_content = $vids->videos();

$vid_comments = $vids->get_comments();

if($vid_comments) {
  $comments = ' <div id="blog-line">&nbsp;</div><div id="comment-block-title">Comments</div>';
  while($res = $vid_comments->fetch_object()) {
    $title   = $res->{CR_COMMENTS_TITLE};
    $author  = $res->{CR_COMMENTS_AUTHOR};
    $comment = $res->{CR_COMMENTS_COMMENT};
    $created = date("F j, Y", strtotime($res->{CR_COMMENTS_CREATED}));
    $user    = ($author) ? $author: $res->{CR_USER_ACCOUNT_USERNAME};
  
    $comments .= '<div id="comment-block"><div class="comment-title">' . $title . '</div> <div class="comment-desc">submitted by ' . $user . ' on ' . $created . '</div><div class="comment">' . $comment . '</div></div>';
  }

}

?>
