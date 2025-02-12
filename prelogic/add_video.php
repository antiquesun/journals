<?

if($_POST && $_POST['add_video']) {


 include("classes/video.class.php");
 include("classes/class.dropshadow.php");

 $vid = $_FILES['file']['tmp_name'];
 $vid_name = $_FILES['file']['name'];
 $success = false;
 

 $filesize = getimagesize($vid);

 $new_vid = new Video;
 $new_vid->save_video();
 
 if($new_vid->message) {
     $error = '<div id="error">' . $new_vid->message . '</div>';
    }
  else $success = true;
//var_dump($_FILES);

 
}

?>