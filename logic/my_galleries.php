<?php

if($galleries) {

  while($res = $galleries->fetch_object()) {
    $gallery_id      = $res->{CR_GALLERIES_GALLERY_ID};
    $gallery_title   = $res->{CR_GALLERIES_GALLERY_TITLE};
    $gallery_summary = $res->{CR_GALLERIES_GALLERY_SUMMARY};
    $image_id        = $res->{CR_GALLERY_IMAGE_IMAGE_ID};
    $date            = date('F j, Y', strtotime($res->{CR_GALLERIES_CREATED}));

    if(!isset($gl[$gallery_id])) {
    $gallery_list .='<div id="gallery-page-block">
                   <div class="gallery-image"><a href="/edit_gallery/' . $gallery_id . '/" ><div class="img-shadow"><img src="/media/galleries/' . $gallery_id . '/thumbs/' . $image_id . '.jpg"  border="0" alt="' .  $gallery_title . '"/></div></a></div><br/>
                   <div class="gallery-title"><a href="/edit_gallery/' . $gallery_id . '/" >' . $gallery_title . '</a></div>
                   <div class="gallery-author">Created ' . $date . '</div>
                   <div class="gallery-date"><a class="edit" href="/edit_gallery/' . $gallery_id . '/">Edit this gallery</a><br/>
                                             <a class="edit" href="/delete_gallery/' . $gallery_id . '/">Delete this gallery</a></div>
                  </div>';
    $gl[$gallery_id] = $gallery_id;
    }

  }

}


?>