

<div id="mainContainer">

<div id="gallery-block">

<?=$error?>

<div id="pagetitle">Add Image</div>
<p>To add a photo or image to a gallery, use the form below to give it a title, description and upload the image.  You must have created a gallery in order to add images.  
If you have not created a gallery, go to the <a href="/add_gallery/">Add A Gallery</a> page.</p>
<p><b>Please note:</b> Your image may take about 20 seconds to upload for processing!</p>
 <br/>
 

 
 
  <form name="addimage" method="post" enctype="multipart/form-data" action="/add_image/">
    <div class="left">
     <ul>
      <li>Select Gallery:</li><br/>
      <li>Image Title:</li>
      <li>Image Caption:</li>
      <li>Image:</li>
     </ul>
    </div>


    <div class="right">
     <ul>
      <li><select name="gallery"><option value=""> - Select -</option><?=$list?></select></li><br/>
      <li><input id="blogtitle" type="text" name="image_title" value="<?=$image_title?>" /></li>
      <li><input id="blogtitle" type="text" name="image_caption" value="<?=$image_caption?>" /></li>
      <li><input type="file" name="filename" /></li>
     </ul>

     <div style="padding-top: 20px;"><input type="submit" name="submit" value="Add Image" /></div>

    </div>
    <input type="hidden" name="add_image" value="1" />

  </form>


 
</div>

<br/><br/>

<?=$image_added?>

</div>