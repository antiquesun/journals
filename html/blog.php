<div id="mainContainer">
 
 <?=$error?>
 
 <div id="pagetitle"><?=$blog_title?></div>
 
 <div id="profile">Submitted by <?=$author?> on <?= date("F j, Y", strtotime($created)); ?></div>
 
<br/><br/>
<div id="blog-body">

 <?=$blog_body?>

</div>

 <br/>



 <?=$comments?>
 <!-- For comments adding by users -->
 <?php  { 
 
  
  include("includes/comment_form.php");
  
 } ?>

</div>