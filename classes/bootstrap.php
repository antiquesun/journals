<?php
/*
 * Created on July 9, 2007
 *
 * @Author: Kent W Blodgett
 * Project: Crossroads Family site
 * 
 * @bootstrap.php
 * This is to be used as a helper class to 
 * manage the page dynamic creation
 * 
 * Methods used:
 * 
 */
 
 class bootstrap {

 	var $args;
 	
 	public function __construct() {
 		$page_exists = TRUE;
 		$pagename = (isset($_GET["page"])) ? $_GET["page"] : "home";
 		$this->args = explode("/",$pagename);
        
        
        // For the logic to deal with any special circumstances or form posts on page
        if(file_exists("prelogic/" . $this->args[0] . ".php")) include("prelogic/" . $this->args[0] . ".php");
 		
        // This is for headers - TODO: turn into method return
        include("headers/default.php");
 		
 		// For the main body include
 		
 		if(file_exists("logic/" . $this->args[0] . ".php")) include("logic/" . $this->args[0] . ".php");
 		if(file_exists("html/" . $this->args[0] . ".php")) include("html/" . $this->args[0] . ".php");
 		//else include("404/index.php");
 		
 		// This is for footers - TODO: turn into method return
 		include("footers/default.php");
 		
 		
 		
 	}
 	
 	public function arg_list() {
 		return $this->args;	
 	}
 	
 	
 	
 	
 	public function __destruct(){}
 	
 }
?>
