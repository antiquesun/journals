<?php

if($blogs) {
 static $blog_output;
 
 while($res = $blogs->fetch_object()) {
    $blogid   = $res->{CR_BLOG_BLOG_ID};
    $userid   = $res->{CR_BLOG_ACCOUNT_ID};
    $username = $res->{CR_USER_ACCOUNT_USERNAME};
    $title    = $res->{CR_BLOG_TITLE};
    $summary  = $res->{CR_BLOG_SUMMARY};
    $created  = date("F d, Y", strtotime($res->{CR_BLOG_CREATED}));
    
    $blog_output .= '<div id="blogblock" style="padding-top: 5px; border-bottom: 0px;">
                      <div class="blogtitle"><a class="title" href="/blog/' . $blogid . '/">' .  $title . '</a> submitted by <a class="profile" href="/profile/' . $userid . '/" >' . $username . '</a> - ' . $created . '</div>
                      <div class="blogsummary">' . $summary . '</div>
                      <a class="readmore" href="/blog/' . $blogid . '/">read more...</a>
                     </div>';
   }
}

if($galleries) {
  static $gallery_output;
  while($res = $galleries->fetch_object()) {
    $gallery_id      = $res->{CR_GALLERIES_GALLERY_ID};
    
    $gallery_title   = $res->{CR_GALLERIES_GALLERY_TITLE};
    $gallery_summary = $res->{CR_GALLERIES_GALLERY_SUMMARY};
    $username        = $res->{CR_USER_ACCOUNT_USERNAME};
    $account_id      = $res->{CR_GALLERIES_ACCOUNT_ID};
    $image_id        = $res->{CR_GALLERY_IMAGE_IMAGE_ID};
    $date            = date('F j, Y', strtotime($res->{CR_GALLERIES_CREATED}));

   
    $gallery_output .='<div id="gallery-page-block">
                   <div class="gallery-image"><a href="/gallery/' . $gallery_id . '/" ><div class="img-shadow"><img src="/media/galleries/' . $gallery_id . '/thumbs/' . $image_id . '.jpg"  border="0" alt=""/></div></a></div><br/>
                   <div class="gallery-title">' . $gallery_title . '</div>
                   <div class="gallery-author">Posted by ' . $username . '</div>
                   <div class="gallery-date">' . $date . '</div>
                  </div>';
    
  }
}

if ($videos) {
 static $video_output;
 
 while($res = $videos->fetch_object()) {
    $video_title   = $res->{CR_VIDEOS_VIDEO_TITLE};
    $video_summary = $res->{CR_VIDEOS_VIDEO_SUMMARY};
    $video_id      = $res->{CR_VIDEOS_VIDEO_ID};
    $author        = $res->{CR_USER_ACCOUNT_USERNAME};
    $created       = date('F j, Y', strtotime($res->{CR_VIDEOS_CREATED}));
    
    $video_output .= '<div id="gallery-page-block">
                       <div class="gallery-image"><a href="/video/' . $video_id . '/" ><div class="img-shadow"><img src="/media/thumbs/' . $video_id . '.jpg" width="174" height="130" border="0" alt=""/></div></a></div><br/>
                       <div class="gallery-title"><a href="/video/' . $video_id . '/" >' . $video_title . '</a></div>
                       <div class="gallery-author">Posted by ' . $author . '</div>
                       <div class="gallery-date">' . $created . '</div>
                      </div>';
 }

}

?>