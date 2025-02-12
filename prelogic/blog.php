<?php
include_once("includes/mysql.php");
include_once("classes/blog.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
static $error;

if(isset($_POST['Blog_id']) && isset($_POST['add_comment'])) {

  $ac = new Blog($db);
  $ac->add_comment();

  if($ac->message) {
    $error = '<div id="error">' . $ac->message . '</div>';  
   } else {
    header("Location: /blog/" . $_POST['Blog_id'] . "/");
  }


}


$blog = new Blog($db);
$blog_content = $blog->get_blog_contents();
$blog_comments = $blog->get_comments();

if($blog_comments) {
  $comments = ' <div id="blog-line">&nbsp;</div><div id="comment-block-title">Comments</div>';
  while($res = $blog_comments->fetch_object()) {
    $title   = $res->{CR_COMMENTS_TITLE};
    $author  = $res->{CR_COMMENTS_AUTHOR};
    $comment = $res->{CR_COMMENTS_COMMENT};
    $created = date("F j, Y", strtotime($res->{CR_COMMENTS_CREATED}));
    $user    = ($author) ? $author: $res->{CR_USER_ACCOUNT_USERNAME};
  
    $comments .= '<div id="comment-block"><div class="comment-title">' . $title . '</div> <div class="comment-desc">submitted by ' . $user . ' on ' . $created . '</div><div class="comment">' . $comment . '</div></div>';
  }

}

?>