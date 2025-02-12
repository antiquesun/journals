<?php
static $comment_author;
static $comment_author_title;
static $post_content;
static $post_title;
static $post_author;
if (isset($_POST['comment_title'])) $post_title = $_POST['comment_title'];
if (isset($_POST['comment_author'])) $post_author = $_POST['comment_author'];
if (isset($_POST['comment_content'])) $post_content = $_POST['comment_content'];
if (!isset($_SESSION['username'])) {
  $comment_author_element = "<li>Comment Author: </li>";
  $comment_author = '<li><input id="comment_title" type="text" name="comment_author" style="width: 600px;" value="'.$post_author .'" /></li>';
}
?>
<div id="blog-line">&nbsp;</div>

<div id="comment-block-title">Add A Comment</div>

<div id="comment">

 <form name="comment" method="post" action="/<?=strtolower($page_name)?>/<?=$_GET['param1']?>/">
  <div class="left">
  <ul>
   <li>Title/Subject:</li>
   <?=$comment_author_title?>
   <li>Comment Body:</li>
  </ul>
 </div>
 
 
 <div class="right">
  <ul>
   <li><input id="comment_title" type="text" name="comment_title" style="width: 600px;" value="<?=$post_title?>" /></li>
   <?=$comment_author?>
   <li><textarea name="comment_content" style="height: 150px;"><?=$post_content?></textarea></li>
   <li style="padding-top: 150px;"><input type="submit" name="submit" value="Submit Comment" style="font-size:1.0em"/></li>
  </ul>
 </div>
 
 

 <input type="hidden" name="<?=$page_name?>_id" value="<?=$_GET['param1']?>" />
 <input type="hidden" name="add_comment" value="1" />
 </form>
</div>
