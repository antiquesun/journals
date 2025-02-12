<?php
/* globals.php
 * Created on July 9, 2007
 *
 * @Author: Kent W Blodgett
 * Project: x-roads Family site
 */

$session_init = new sessions;


$navItems = new navigation;

//$navigation = $navItems->right_navigation();
//$utility_bar   = $navItems->utility_bar();
//$account_items = $navItems->account_items();
//$breadcrumbs   = $navItems->ds_page_title();
$page_name     = ucfirst($navItems->get_pagename());



/* *********  These are functions used thoughout site  ********* */

function validate_email ($eadd)
   {
      return (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'. '@'. '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.' . '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $eadd));
   }

/* *********************************************************************** */



?>
