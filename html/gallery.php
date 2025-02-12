<div id="mainContainer">

 <?=$error?>

 <div id="pagetitle"><?=$gallery_title?></div>

 <div id="profile">Created by <?=$author?> on <?=date("F j, Y", strtotime($gallery_created)); ?></div>

 <div id="summary"><?=$gallery_summary?></div>

<br/><br/>
<div id="blog-body">

 <?=$gallery_body?>
 
 <br/><br/><br/>



 <?=$comments?>
 <!-- For comments adding by users -->
 <?php  {


  include("includes/comment_form.php");

 } ?>

</div>


</div>