<script language="javascript" type="text/javascript" src="/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "advhr,advlink,emotions,preview,zoom,nonbreaking",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,separator,forecolor,backcolor",
		theme_advanced_buttons3_add : "emotions,advhr,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style],p[lang]",
		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : false,
		apply_source_formatting : false
	});

</script>

<div id="mainContainer">

<div id="gallery-block">

<?=$error?>
<div id="pagetitle">Add A Car Item</div>
<p>To add a car to your portfolio, please use the form below to enter in all of the information.  Try to fill in as much detail as you can about your item.</p>
 <br/>
 <form name="addgallery" method="post" enctype="multipart/form-data" action="/add_item/">

 <div class="left">
  <ul>
   <li>Title/Subject:</li>
   <li>Year:</li>
   <li>Make:</li>
   <li>Model:</li>
   <br/>
   <li>VIN:</li>
   <li>Vehicle title:</li>
   <li>Condition:</li>
   <li>Mileage:</li>
   <br/>
   <li>Body Type:</li>
   <li>Engine:</li>
   <li>Transmission:</li>
   <li>Exterior Color:</li>
   <li>Interior Color:</li>
   <br/>
   <li>Remarks & Comments:</li>
   <br/><br/><br/><br/><br/><br/><br/><br/><br/>
   <li>Image Title:</li>
   <li>Image Caption:</li>
   <li>Image:</li>
  </ul>
 </div>


 <div class="right">
  <ul>
   <li><input id="blogtitle" type="text" name="item_title" value="<?=$_POST['item_title']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_year" value="<?=$_POST['item_year']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_make" value="<?=$_POST['item_make']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_model" value="<?=$_POST['item_model']?>" /></li>
   <br/>
   <li><input id="blogtitle" type="text" name="item_VIN" value="<?=$_POST['item_VIN']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_vtitle" value="<?=$_POST['item_vtitle']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_condition" value="<?=$_POST['item_condition']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_mileage" value="<?=$_POST['item_mileage']?>" /></li>
   <br/>
   <li><input id="blogtitle" type="text" name="item_btype" value="<?=$_POST['item_btype']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_engine" value="<?=$_POST['item_engine']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_trans" value="<?=$_POST['item_trans']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_ecolor" value="<?=$_POST['item_ecolor']?>" /></li>
   <li><input id="blogtitle" type="text" name="item_icolor" value="<?=$_POST['item_icolor']?>" /></li>
   <br/>
   <li><textarea id="gallery-summary" name="item_summary" ><?=$item_summary?></textarea></li>
   <br/><br/><br/><br/><br/><br/><br/><br/>
   <li><input id="blogtitle" type="text" name="image_title" value="<?=$_POST['image_title']?>" /></li>
   <li><input id="blogtitle" type="text" name="image_caption" value="<?=$_POST['image_caption']?>" /></li>
   <li><input type="file" name="filename" /></li>
  </ul>

  <div style="padding-top: 40px;"><input type="submit" name="submit" value="Add Car" /></div>
 </div>

 <input type="hidden" name="add_item" value="1" />

 </form>


</div>





</div>