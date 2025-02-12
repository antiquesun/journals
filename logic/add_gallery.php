<?php

 if($success==true) {
 
   $post_info ="Congratulations! You added the gallery <strong>". $_POST['gallery_title'] . "</strong>.<br/>  To add images to it, go to the <a href='/add_image/'>Add an Image</a> page and post an image.";
   unset($_POST['gallery_title']);
 }


?>