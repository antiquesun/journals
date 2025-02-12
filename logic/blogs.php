<?php
 static $blog_output;
 
if($blogs) {


  while($res = $blogs->fetch_object()) {
    $blogid   = $res->{CR_BLOG_BLOG_ID};
    $userid   = $res->{CR_USER_ACCOUNT_ACCOUNT_ID};
    $username = $res->{CR_USER_ACCOUNT_USERNAME};
    $title    = $res->{CR_BLOG_TITLE};
    $summary  = $res->{CR_BLOG_SUMMARY};
    $created  = date("F d, Y", strtotime($res->{CR_BLOG_UPDATED}));
    
    $blog_output .= '<div id="blogblock">
                      <div class="blogtitle"><a class="title" href="/blog/' . $blogid . '/">' .  $title . '</a> submitted by <a class="profile" href="/profile/' . $userid . '/" >' . $username . '</a> - ' . $created . '</div>
                      <div class="blogsummary">' . $summary . '</div>
                      <a class="readmore" href="/blog/' . $blogid . '/">read more...</a>
                     </div>';
                      
                      
  
  }
}


?>