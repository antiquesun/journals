<?php
/*
 * Created on July 9, 2007
 *
 * @Author: Kent W Blodgett
 * Project: Crossroads Family site
 * 
 * login.php
 * This is to be used as a helper class to 
 * manage the login process in combination with the sessions class
 * 
 * Methods used:
 * loginuser
 */
class Login
  {
    public $error;
    public $nbr = 0;
    private $db;
    
    function __construct(DB $db){
        $this->db = $db;
    }
    
    public function loginuser($un,$pw,$session_id="",$loc="")
       {
         $sesid = md5(time());
         
         
         $uqry =  $this->loginqry($un,$pw);
         $res = $uqry->fetch_object();
         $active   = $res->{'activated'};   

            if (!$uqry || mysqli_num_rows($uqry) < 1) 
             {
               $this->error = "<font color='red'>I'm sorry - we do not have a record of this username/password combination! Try again...</font>";
               return $this->error;
             
             }
            elseif ($active != 1) 
             {
               $this->error = "<font color='red'>I'm sorry - We are currently in the process of reviewing your information and will get back to you shortly.</font>";
               return $this->error;
             
             }
            else 
             {
                
                $aid      = $res->{'account_id'};
                $email    = $res->{'email'};
                $username = $res->{'username'};
                $fname    = $res->{'first_name'};
                $lname    = $res->{'last_name'};
                
                $sessarr = array(
                  'aid'     => $aid,
                  'email'   => $email,
                  'username'=> $username,
                  'fname'   => $fname,
                  'lname'   => $lname
                );  
            
               session_save_path(CR_SESSION_PATH);
            
               if($session_id) session_id($session_id);
			   else session_id($sesid);
               if($_COOKIE['user_crfs']) 
                {
       
         	      $file = CR_SESSION_PATH ."/sess_" . $_COOKIE['user_crfs'];
           
                  setcookie('user_crfs','',time()-2580000,'/');
                  setcookie('crfs','',time()-2580000,'/');
                }
              session_name('user_crfs');
              session_start();
	          foreach ($sessarr as $key => $val) 
	            {
                   $_SESSION[$key] = $val;
                 } 
              
              $id_hash = $un . ";;;" . $pw;
            
              setcookie('crfs',$id_hash,time()+2580000,'/');
 
           }
         
       }
     
	 
	 private function checkUID($uid)
			  {
				
				  $sql = myQuery("SELECT user_id FROM members WHERE user_id = $uid");
					$temp = mysql_fetch_object($sql);
					$u = $temp->user_id;
				  if(!$u OR $u != $uid) $this->relog;
				}
     
     public function logout($s,$h="home")
       {
         $file = CR_SESSION_PATH ."/sess_" . $s;
         session_save_path(CR_SESSION_PATH);
         session_name('user_crfs');
         session_start();
         if(file_exists($file)) unlink($file);
         $_SESSION = array();
         setcookie('user_crfs','',time()-2580000,'/');
         setcookie('crfs','',time()-2580000,'/');
         
         header("Location: /$h/");
       }

     public function relog()
       {
         $str = $_COOKIE[crfs];
         $liArr = split(';;;',$str);
       
         $un = $liArr[0];
         $pw = $liArr[1];
         if ($_COOKIE[user_crfs]) $sesid = $_COOKIE[user_crfs];
         else $sesid = md5(time());
        
         $isParent = (stristr($un,'.')) ? TRUE : FALSE;
         
         $uqry = $this->loginqry($un,$pw);

         
         if (!$uqry || mysql_num_rows($uqry) < 1) 
           {
             $this->error = "<font color='red'>I'm sorry - we do not have a record of this username/password combination! Try again...</font>";
             return $this->error;
             
           }
         else
          {
           $res = @mysql_fetch_array($uqry);
           
             
            $aid      = $res['account_id'];
            $email    = $res['email'];
            $username = $res['username'];
            $fname    = $res['first_name'];
            $lname    = $res['last_name'];

       
            $sessarr = array(
               'aid'     => $aid,
               'email'   => $email,
               'username'=> $username,
               'fname'   => $fname,
               'lname'   => $lname
             );  
            
            @session_save_path(CR_SESSION_PATH);
            @session_id($sesid);
            @session_name('user_crfs');
            @session_start();
	         
	        while (list ($key, $val) = each ($sessarr)) 
               {
                 $_SESSION[$key] = $val;
               } 
            
          }
      }
      
      
      public function reset_pass($un) {
      
      
      
      }
      
      
      private function loginqry($un,$pw) {
         $sql = "SELECT * FROM " . CR_USER_ACCOUNT_TABLE . 
                            " WHERE " . CR_USER_ACCOUNT_USERNAME . " = '$un' " .
                            "   AND " . CR_USER_ACCOUNT_PASSWORD . " = '$pw'";
        $qry = mysqli_query($this->db, $sql);
         return $qry;
      }
      
      
      
     
      
   }
   

?>