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
<div id="pagetitle">Add A Gallery</div>
<p>To add a gallery, please use the form below to enter in all of the information and select the Add Gallery button.</p>
 <br/>
<?=$post_info?>
<!--? if ($success==false) { ?-->
 <form name="addgallery" method="post" enctype="multipart/form-data" action="/add_gallery/">

 <div class="left">
  <ul>
   <li>Gallery Title:</li>
   <br/>
   <li>Gallery Summary:</li>
  </ul>
 </div>


 <div class="right">
  <ul>
   <li><input id="blogtitle" type="text" name="gallery_title" value="<?=$gallery_title?>" /></li>
   <br/>
   <li><textarea id="gallery-summary" name="gallery_summary" ><?=$gallery_summary?></textarea></li>
   
  </ul>
 <br/><br/><br/><br/><br/><br/>
  <div style="padding-top: 40px;"><input type="submit" name="submit" value="Add Gallery" /></div>
 </div>

 <input type="hidden" name="add_gallery" value="1" />

 </form>

<!--?    }   ?-->
 
</div>

<br/><br/>




</div>