<?php

if($video_content) {
  $vidres = $video_content->fetch_object();
  $video_id      = $vidres->{CR_VIDEOS_VIDEO_ID};
  $video_title   = $vidres->{CR_VIDEOS_VIDEO_TITLE};
  $video_summary = $vidres->{CR_VIDEOS_VIDEO_SUMMARY};
  $author        = $vidres->{CR_USER_ACCOUNT_USERNAME};
  $created       = $vidres->{CR_VIDEOS_CREATED};

}

?>