<?php
static $error;

if($video_content) {
  static $video_output;
  while($res = $video_content->fetch_object()) {
    $video_title   = $res->{CR_VIDEOS_VIDEO_TITLE};
    $video_summary = $res->{CR_VIDEOS_VIDEO_SUMMARY};
    $video_id      = $res->{CR_VIDEOS_VIDEO_ID};
    $author        = $_SESSION['username'];
    $created       = date('F j, Y', strtotime($res->{CR_VIDEOS_CREATED}));
    
    $video_output .= '<div id="gallery-page-block">
                       <div class="gallery-image"><a href="/video/' . $video_id . '/" ><div class="img-shadow"><img src="/media/thumbs/' . $video_id . '.jpg"  width="174" border="0" alt=""/></div></a></div><br/>
                       <div class="gallery-title"><a href="/video/' . $video_id . '/" >' . $video_title . '</a></div>
                       <div class="gallery-author"><a class="readmore" href="/edit_video/' . $video_id . '/">Edit This Video</div>
                       <div class="gallery-date"><a class="readmore" href="/delete_video/' . $video_id . '/">Delete This Video</div>
                      </div>';
  
  }

}

?>