

<div id="mainContainer">

<div id="gallery-block">

<?=$error?>

<div id="pagetitle">Add Video</div>
<p>To add a video, use the form below to give it a title, description and upload the content.  </p>
<p><b>Please note:</b> Your video may take quite a while to upload depending on its size so have some patience!</p>
 <br/>
 

 
 
  <form name="addvideo" method="post" enctype="multipart/form-data" action="/add_video/">
    <div class="left">
     <ul>
      <li>Video Title:</li>
      <li>Video Summary:</li>
      <li>Video:</li>
     </ul>
    </div>


    <div class="right">
     <ul>
      <li><input id="blogtitle" type="text" name="video_title" value="<?=$_POST['video_title']?>" /></li>
      <li><input id="blogtitle" type="text" name="video_summary" value="<?=$_POST['video_summary']?>" /></li>
      <li><input type="file" name="file" /></li>
     </ul>

     <div style="padding-top: 20px;"><input type="submit" name="submit" value="Add Video" /></div>

    </div>
    <input type="hidden" name="add_video" value="1" />

  </form>


 
</div>


<?=$video_added?>

</div>