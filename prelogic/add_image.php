<?php

static $list;
static $error;
static $success;
static $image_title;
static $image_caption;
static $image_added;
static $image;

$image_title   = (isset($_POST['image_title'])) ? $_POST['image_title'] : "";
$image_caption = (isset($_POST['image_caption'])) ? $_POST['image_caption'] : "";


include("classes/gallery.php");
$db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
$galleries = new gallery($db);

if($_POST && isset($_POST['add_image'])) {
 static $gallery;
 $gallery = $_POST['gallery'];

 include("classes/Thumbnail.class.php");
 include("classes/class.dropshadow.php");

 $image = $_FILES['filename']['tmp_name'];
 $image_name = $_FILES['filename']['name'];
 $success = false;
 

 $filesize = getimagesize($image);

 $ii = new gallery($db);
 $image_id = $ii->add_image();
 $newimagename = "/" . $image_id . ".jpg";
 $newthumbname = "/tn_" . $image_id . ".jpg";

 if($ii->message) {
     $error = '<div id="error">' . $ii->message . '</div>';
    }
  else {
    $newimage = new Thumbnail($image);
    $newimage->size(750,600);
    $newimage->quality=200;
    $newimage->output_format='JPG';
    $newimage->jpeg_progressive=0;
    $newimage->allow_enlarge=false;
    $newimage->CalculateQFactor(10000000);
    $newimage->bicubic_resample=false;
    $newimage->memory_limit='40M';
    $newimage->max_execution_time='30';

    $newimage->process();

    $newimage->save(CR_IMAGE_LOCATION . $gallery . $newimagename);


    $thumb=new Thumbnail($image);
    $thumb->size_auto(120);
    $thumb->quality=200;
    $thumb->output_format='JPG';
    $thumb->jpeg_progressive=0;
    $thumb->allow_enlarge=false;
    $thumb->CalculateQFactor(1000000);
    $thumb->bicubic_resample=false;
    $thumb->memory_limit='40M';
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
    $success = true;
    //header("Location: /add_image/");
   }
}

?>