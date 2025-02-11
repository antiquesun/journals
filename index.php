<?php
/*
 * Originally created on June, 2009
 *
 * Author: Kent W Blodgett
 * Project: Journals 
 *  
 * This index page 
 * is where all the logic flows from initially.  An include process 
 * will bring in the appropriate global and page specific files for
 * each load.
 * 
 * Note: This is running mod_rewrite
 */

//Includes necessary (dependencies)
include("includes/constants.php");
include("includes/mysql.php");
include("classes/login.php");
include("classes/sessions.php");
include("classes/navigation.php");

include("includes/globals.php");
include("classes/bootstrap.php");

$init = new bootstrap;

$arg_list = $init->arg_list();


?>
