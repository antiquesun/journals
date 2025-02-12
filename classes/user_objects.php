<?php
/*
 * Created on Apr 16, 2007
 *
 * @Author: Kent W Blodgett
 * Project: Fly World Web Store v 0.1
 */
 

class user_objects {
	
	var $sessions;
	
	
	public function utility_bar() {
 		if($this->page_name != "users") $pt = $this->ds_page_title();
 		$flybucks = $_SESSION['flybucks'];
 		var_dump($_SESSION);
 		$this->ubar = '<div id="utility_bar">';
        $this->ubar .= '<div class="breadCrumbs">You are here:&nbsp;&nbsp;' . $pt . '</div>';
	    
	    $this->ubar .= '<div class="acct">';
	    $this->ubar .= '<ul>Account Balance: &nbsp;$';
		$this->ubar .= $flybucks;
		$this->ubar .= '<li>&nbsp;<a href="/wishlist/">My Wishlist ()</a> </li>
	                   </ul>';
         $this->ubar .= '<!--TOP LEFT CORNER TEXT-->
         <!-- <b>CAN USE TEXT HERE.....</b>-->
			<!--WARNING TEXT-->
        <div id="warningBar">
         <!-- <p>CAN USE TEXT HERE.....</p>-->
        </div>';
        $this->ubar .= '</div>
                      </div>';
                      
        return $this->ubar;
 	}
 	
 	
}
?>
