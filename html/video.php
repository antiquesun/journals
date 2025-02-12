<div id="mainContainer">
 
 <?=$error?>

 <div id="pagetitle"><?=$video_title?></div>
 
 <div id="profile">Submitted by <?=$author?> on <?= date("F j, Y", strtotime($created)); ?></div>
 
<br/><br/>
<div id="blog-body">


<video width="640" height="480" controls poster="/media/thumbs/<?=$video_id?>.jpg">
  <source src="/media/videos/<?=$video_id?>.mp4" type="video/mp4">
  
  Your browser does not support the video tag.
</video>

</div>

 <br/>



 <?=$comments?>
 <!-- For comments adding by users -->
 <?php  { 
 
  
  include("includes/comment_form.php");
  
 } ?>

</div>