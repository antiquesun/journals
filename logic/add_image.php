<?php


$gallery_list = $galleries->get_gallery_list();

while($res = $gallery_list->fetch_object()) {
  $gallery_id = $res->{CR_GALLERIES_GALLERY_ID};
  $gallery_title = $res->{CR_GALLERIES_GALLERY_TITLE};
  
  $list .= '<option value="'. $gallery_id . '">' .$gallery_title . '</option>';

}

if($success == true) {
  
  $image_added = "Congratulations!  You have added the following image: <img src='/media/galleries/" . $gallery . "/shadowed" . $newimagename . "'>";
  $_POST = array("");

}

?>