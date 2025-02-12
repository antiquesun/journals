<?php
/*
 * Created on Jan 12, 2007
 *
 * @Author: Kent W Blodgett
 * Project: X-Roads Family site
 */
 
class navigation {

 	var $categories;
 	var $product_list;
 	var $ubar;
 	var $page_title;
 	var $page_name;
 	var $cat;
    var $p1;
    var $p2;
    var $category_list;
    var $aitems;
    
    
    public function get_pagename() {
      $this->page_name = (isset($_GET["page"])) ? str_replace("_"," ",$_GET["page"]) : "home";
      return $this->page_name;
     }
     
   
    private function get_param1() {
      $this->p1 = (isset($_GET["param1"])) ? $_GET["param1"] : "";
      return $this->p1;
     }
 	
 	private function get_param2() {
      $this->p2 = (isset($_GET["param2"])) ? $_GET["param2"] : "";
      return $this->p2;
     }
 	
 	
 	
 	public function ds_page_title() {
 		$page_name = $this->get_pagename();
 		
 		$p1 = $this->get_param1();
 		$p2 = $this->get_param2();
 		
 		
 		
 		
 		if($cat && $co == FALSE) {
 		  $this->page_title = ($pid > 0) ? '<a href="/home/">Home</a> >> <a href="/products/' . $cat . '/">' . ucfirst($category) . '</a> >> ' . ucfirst($product) : (($cat>0) ? '<a href="/home/">Home</a> >> ' . ucfirst($category) : ucfirst($page_name));
 		}
 		else {
 		  $this->page_title = ($page_name != 'home')  ? '<a href="/home/">Home</a> >> ' . str_replace("_"," ",ucfirst($page_name)) : str_replace("_"," ",ucfirst($page_name));
 		  
 		}
 		
 		return $this->page_title;
 	}
 	
 
 	
 	
 	
 }
?>