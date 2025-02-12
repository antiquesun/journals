<script language="javascript" type="text/javascript" src="/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "spellchecker,layer,table,advhr,advimage,advlink,emotions,iespell,preview,zoom,media,searchreplace,print,contextmenu,paste,noneditable,visualchars,nonbreaking,xhtmlxtras,template,filemanager,imagemanager",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,spellchecker,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,|,insertfile,insertimage",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
	    plugin_insertdate_dateFormat : "%Y-%m-%d",
	    plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style],p[lang]",
		external_link_list_url : "/js/tinymce/examples/example_link_list.js",
		external_image_list_url : "/js/tinymce/examples/example_image_list.js",
		flash_external_list_url : "/js/tinymce/examples/example_flash_list.js",
		template_external_list_url : "/js/tiny_mce/examples/example_template_list.js",
		file_browser_callback : "mcFileManager.filebrowserCallBack",
		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : false,
		apply_source_formatting : true,
		spellchecker_languages : "+English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr,German=de,Italian=it,Polish=pl,Portuguese=pt,Spanish=es,Swedish=sv"
	});

</script>

 
 
<div id="mainContainer">
<?=$error?>
 <div id="pagetitle">Add A New Blog</div>
 <br/>
 <form name="adddiscussion" method="post" action="/add_blog/">
 
 <div class="left">
  <ul>
   <li>Title/Subject:</li>
   <li>Summary:</li>
   <li>Discussion Body:</li>
  </ul>
 </div>
 
 
 <div class="right">
  <ul>
   <li><input id="blogtitle" type="text" name="title" value="<?=$title?>" /></li>
   <li><input id="blogtitle" type="text" name="summary" value="<?=$summary?>" /></li>
   <li><textarea name="content" ><?=$content?></textarea></li>
   
  </ul>
  
  <div style="padding-top: 420px;"><input type="submit" name="submit" value="Submit Blog" /></div>
 </div>
 
 <input type="hidden" name="add_blog" value="1" />
 
 </form>
 
 
 



</div>