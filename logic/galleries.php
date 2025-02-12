<?php
  static $galleries;
  
  while($res = $gallery_list->fetch_object()) {
    $gallery_id      = $res->{CR_GALLERIES_GALLERY_ID};
    $gallery_title   = $res->{CR_GALLERIES_GALLERY_TITLE};
    $gallery_summary = $res->{CR_GALLERIES_GALLERY_SUMMARY};
    $username        = $res->{CR_USER_ACCOUNT_USERNAME};
    $account_id      = $res->{CR_GALLERIES_ACCOUNT_ID};
    $image_id        = $res->{CR_GALLERY_IMAGE_IMAGE_ID};
    $date            = date('F j, Y', strtotime($res->{CR_GALLERIES_CREATED}));

    if(!isset($gl[$gallery_id])) {
    $galleries .='<div id="gallery-page-block">
                   <div class="gallery-image"><a href="/gallery/' . $gallery_id . '/" ><div class="img-shadow"><img src="/media/galleries/' . $gallery_id . '/thumbs/' . $image_id . '.jpg"  border="0" alt=""/></div></a></div><br/>
                   <div class="gallery-title">' . $gallery_title . '</div>
                   <div class="gallery-author">Posted by ' . $username . '</div>
                   <div class="gallery-date">' . $date . '</div>
                  </div>';
    $gl[$gallery_id] = $gallery_id;
    }

  }


?>