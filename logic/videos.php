<?php
static $video_output;
static $error;

if($video_content) {

  while($res = $video_content->fetch_object()) {
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