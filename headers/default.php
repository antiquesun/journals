<?php
/*
 * Created on June 30, 2009
 *
 * @Author: Kent W Blodgett
 * Project: The Carnival
 */

global $navigation;
global $page_name;
$pn = " :: " . $page_name;

static $login_status;
ob_start();
if (isset($_SESSION)) {
	include("includes/main_navigation.php");
	$login_status = ob_get_contents();
} else{
	include("includes/login_form.php");
	$login_status = ob_get_contents();
}
ob_end_clean();

//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Family Journals <?=$pn?></title>
<!--Import the css style -->
<link type="text/css" href = "/css/styles.css" rel="stylesheet" media="all" />


<!-- This is for the galleries //-->
<!--script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.dimensions.js"></script>
<script type="text/javascript" src="/js/jquery.modalContent.js"></script>
<script type="text/javascript" src="/js/jquery-effects.js"></script-->

<script type="text/javascript" src="/js/prototype.js"></script>
<script type="text/javascript" src="/js/scriptaculous.js?load=effects,dragdrop"></script>
<script type="text/javascript" src="/js/lightbox.js"></script>
<!--script type="text/javascript" src="/js/lightbox-modal.js"></script-->

<!-- *************************** //-->


<script language="javascript" src="/js/swfobject.js"></script>



</head>

<body>

<div id="modalContentContainer"></div>

<div id="wrapper">
 <div>
  <b class="spiffy">
  <b class="spiffy1"><b></b></b>
  <b class="spiffy2"><b></b></b>
  <b class="spiffy3"></b>
  <b class="spiffy4"></b>
  <b class="spiffy5"></b></b>

  <div class="spiffyfg">




 <div id="contentArea">

  <div id="header">
   <p>Family Journals</p>
  </div>

  <div id="innerContainer">


   <div id="leftnav">
   
   
    <div>
     <b class="spiffyNav">
     <b class="spiffyNav1"><b></b></b>
     <b class="spiffyNav2"><b></b></b>
     <b class="spiffyNav3"></b>
     <b class="spiffyNav4"></b>
     <b class="spiffyNav5"></b></b>

      <div class="spiffyNavfg"> 

       <ul>
        <li><a class="nav" href="/home/">Home</a></li>
        <li><a class="nav" href="/blogs/">Blogs</a></li>
        <li ><a class="nav" href="/galleries/">Galleries</a></li>
        <li ><a class="nav" href="/videos/">Videos</a></li>
       </ul>
 
       <div id="loginBlock">
        <?=$login_status?>
       </div>
    
      </div>
    
     <b class="spiffyNav">
     <b class="spiffyNav5"></b>
     <b class="spiffyNav4"></b>
     <b class="spiffy3Nav"></b>
     <b class="spiffyNav2"><b></b></b>
     <b class="spiffyNav1"><b></b></b></b>
    </div>

  </div>





