<?php
$gallery_id = (int)$_GET['param1'];
$author = "";
static $gallery_body;
static $error;

while($res = $thegallery_content->fetch_object()) {
 $image_id = $res->{CR_GALLERY_IMAGE_IMAGE_ID};
 $caption  = $res->{CR_GALLERY_IMAGE_IMAGE_CAPTION};
 $title    = $res->{CR_GALLERY_IMAGE_IMAGE_TITLE};
// $author   = $res->{CR_GALLERY_IMAGE_IMAGE_TITLE};

 $gallery_body .= '<a href="/media/galleries/' . $gallery_id . '/' . $image_id. '.jpg" title="'. $title . ': ' . $caption . '" rel="lightbox[roadtrip]" ><img src="/media/galleries/' . $gallery_id . '/shadowed/' . $image_id. '.jpg"  alt="'. $title . '" border="0" /></a>';


}

$res2 = $gallery_info->fetch_object();

$author = $res2->{CR_USER_ACCOUNT_USERNAME};
$gallery_created = $res2->{CR_GALLERIES_CREATED};
$gallery_title = $res2->{CR_GALLERIES_GALLERY_TITLE};
$gallery_summary = $res2->{CR_GALLERIES_GALLERY_SUMMARY};


?>