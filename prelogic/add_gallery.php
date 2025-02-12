<?php
static $error;
static $success;
static $post_info;
static $gallery_summary;
static $gallery_title;

if($_POST && isset($_POST['add_gallery'])) {
   $gallery_summary = $_POST['gallery_summary']; 
   $gallery_title = $_POST['gallery_title'];
   $sucess=false;
   $post_info='';
   $db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
   include("classes/gallery.php");
   $ai = new gallery($db);
   $ai->add_gallery();

   if($ai->message) {
     $error = '<div id="error">' . $ai->message . '</div>';
    } else {
     //header("Location: /add_gallery/");
     $success=true;
     unset($_POST['gallery_summary']);
     
   }

}

if($_POST && $_POST['add_image']) {

 $gallery = $_POST['gallery'];

 include("classes/Thumbnail.class.php");
 include("classes/item.php");
 include("classes/class.dropshadow.php");

 $image = $_FILES['filename']['tmp_name'];
 $image_name = $_FILES['filename']['name'];
 

 $filesize = getimagesize($image);

 $ii = new gallery;
 $image_id = $ii->add_image();
 $newimagename = "/" . $image_id . ".jpg";
 $newthumbname = "/tn_" . $image_id . ".jpg";

 if($ii->message) {
     $error = '<div id="error">' . $ii->message . '</div>';
    }
  else {
    $newimage = new Thumbnail($image);
    $newimage->size(750,600);
    $newimage->quality=100;
    $newimage->output_format='JPG';
    $newimage->jpeg_progressive=0;
    $newimage->allow_enlarge=false;
    $newimage->CalculateQFactor(100000);
    $newimage->bicubic_resample=false;
    $newimage->memory_limit='32M';
    $newimage->max_execution_time='30';

    $newimage->process();

    $newimage->save(CR_IMAGE_LOCATION . $gallery . $newimagename);


    $thumb=new Thumbnail($image);
    $thumb->size_auto(120);
    $thumb->quality=75;
    $thumb->output_format='JPG';
    $thumb->jpeg_progressive=0;
    $thumb->allow_enlarge=false;
    $thumb->CalculateQFactor(10000);
    $thumb->bicubic_resample=false;
    $thumb->memory_limit='32M';
    $thumb->max_execution_time='30';

    $thumb->process();
    $thumb->save(CR_IMAGE_LOCATION . $gallery . "/thumbs" . $newimagename);

    $ds = new dropShadow(FALSE);
    $ds->setShadowPath('media/images/shadow/');
    $ds->loadImage(CR_IMAGE_LOCATION . $gallery . '/thumbs' . $newimagename);
    //$ds->resizeByPercent(50, 0);
    $ds->applyShadow('FFFFFF');
    $image_location = CR_IMAGE_LOCATION . $gallery . '/shadowed' . $newimagename;
    $ds->saveShadow($image_location);
    header("Location: /add_image/");
   }
}



?>