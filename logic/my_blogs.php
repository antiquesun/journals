<?php

if($blogs) {
  static $blog_output;
  while($res = $blogs->fetch_object()) {
    $blog_id   = $res->{CR_BLOG_BLOG_ID};
    $title     = $res->{CR_BLOG_TITLE};
    $summary   = $res->{CR_BLOG_SUMMARY};
    $created   = date("F j, Y", strtotime($res->{CR_BLOG_UPDATED}));
    
    $blog_output .= '<div id="blogblock">
                      <div class="blogtitle"><a class="title" href="/blog/' . $blog_id . '/">' .  $title . '</a> ' . $created . '</div>
                      <div class="blogsummary">' . $summary . '</div>
                      <a class="readmore" href="/edit_blog/' . $blog_id . '/">Edit this blog</a><br/>
                      <a class="readmore" href="/delete_blog/' . $blog_id . '/">Delete this blog</a>
                     </div>';
                      
                      
  
  }
}


?>