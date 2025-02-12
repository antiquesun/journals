<?php
$gallery_id = (int)$_GET['param1'];
$author = "";
$i = 1;
static $gallery_body;
static $error;

while($res = $thegallery_content->fetch_object()) {
 $image_id = $res->{CR_GALLERY_IMAGE_IMAGE_ID};
 $caption  = $res->{CR_GALLERY_IMAGE_IMAGE_CAPTION};
 $title    = $res->{CR_GALLERY_IMAGE_IMAGE_TITLE};
// $author   = $res->{CR_GALLERY_IMAGE_IMAGE_TITLE};

 $gallery_body .= '<li id="item_' . $i . '">
                    <div id="gallery-image"><img src="/media/galleries/' . $gallery_id . '/shadowed/' . $image_id. '.jpg"  alt="'. $title . '" border="0" /></div><br/>' .
                    '<div id="gallery-title">Image title: <input type="text" name="title['. $image_id. ']" value="' . $title . '" /></div><br/>
                    <div id="gallery-caption">Image caption: <input type="text" name="summary['. $image_id. ']" value="' . $caption . '" /></div><br/>
                    <a href="/delete_image/' . $image_id . '/' . $gallery_id. '"><img src="/media/images/delete.png" class="roll" alt="Delete" width="25" height="25" border="0" /></a><br/><br/><br/>
                   </li>';
 
 $i++;


}

$res2 = $gallery_info->fetch_object();

$author = $res2->{CR_USER_ACCOUNT_USERNAME};
$gallery_created = $res2->{CR_GALLERIES_CREATED};
$gallery_title = $res2->{CR_GALLERIES_GALLERY_TITLE};
$gallery_summary = $res2->{CR_GALLERIES_GALLERY_SUMMARY};


?>