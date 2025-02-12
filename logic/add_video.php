<?



if($success == true) {
  
  $video_added = "<strong>Congratulations!  You have added the following video:</strong>  <br/><br/><a href='/video/" . $new_vid->vid_file_id  . "/'><img src='/media/thumbs/shadowed/" . $new_vid->vid_file_id . ".jpg' border='0'></a><br/>&nbsp;&nbsp;<strong><a href='/video/" . $new_vid->vid_file_id  . "/'>" . $_POST['video_title'] . "</a></strong>";

  $_POST = array("");

}

?>