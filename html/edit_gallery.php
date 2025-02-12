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

 <?=$error?>


 <form name="editgallery" method="post" action="/edit_gallery/<?=$gallery_id?>/">
 
<div id="gallery-edit-block"> 
 
 <div id="pagetitle">Edit Gallery</div>
 <p>You can drag photo blocks to reposition the images in your gallery. Delete photos from the gallery using the  X icon.</p><br/>
 <div class="left">
  <ul>
   <li>Gallery title/subject:</li>
   <li>Gallery summary:</li>
  </ul>
 </div>


 <div class="right">
  <ul>
   <li><input id="blogtitle" type="text" name="gallery_title" value="<?=$gallery_title?>" /></li>
   <li><textarea id="gallery-summary" name="gallery_summary" ><?=$gallery_summary?></textarea></li>
  </ul>

 </div>
 
</div>

<br/><br/><br/><br/><br/>
  <div id="blog-body">

   <ul id="sortable-list"  style="cursor: move">
    <?=$gallery_body?>
   </ul>
 
   <script language="JavaScript">
    Sortable.create("sortable-list");
   </script>

  </div>


  <input type="submit" name="submit" value="Submit Changes" />
  <input type="hidden" name="gallery" value="<?=$gallery_id?>" />
 </form>


 <br/>



 

</div>