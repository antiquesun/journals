<?

if($_POST['submit'] == 'Register') {
 
  $errCnt = 0;
  $errMess = "";
  
  $preqry = mysql_query("SELECT " . LG_USER_USER_ID . " AS id " .
     				     " FROM " . LG_USER_TABLE . 
     				     " WHERE " . LG_USER_USERNAME . " = '" . $_POST['username'] . "'") or die (mysql_error());
  $usrobj = mysql_fetch_object($preqry);
  
  if( !$_POST['username'] ) {
    $errCnt++;
    $errMess = "Please enter in a username";
    }
  elseif( !$_POST['password'] )  {
    $errCnt++;
    $errMess = "Please enter in a password";
   }
  elseif( !$_POST['repassword'] )  {
    $errCnt++;
    $errMess = "Please confirm your password";
   }
  elseif( $_POST['password'] != $_POST['repassword'])  {
    $errCnt++;
    $errMess = "Your passwords do not match";
   }
  elseif( !$_POST['email'] )  {
    $errCnt++;
    $errMess = "Please enter an email";
   }
   elseif( !validate_email($_POST['email']) )  {
    $errCnt++;
    $errMess = "Please enter a valid email";
   }
  elseif( !$_POST['firstname'] )  {
    $errCnt++;
    $errMess = "Please enter a first name";
   }
  elseif( !$_POST['lastname'] )  {
    $errCnt++;
    $errMess = "Please enter a last name";
   }
  elseif( $usrobj->id > 0 )  {
    $errCnt++;
    $errMess = "Username taken.  Please enter in an alternate username.";
   }
  else {
    if($errCnt == 0) {
      $sql = "INSERT INTO " . LG_USER_TABLE .
                         " (" . LG_USER_USERNAME . ", " . LG_USER_PASSWORD . "," . LG_USER_EMAIL . ", " . LG_USER_FIRSTNAME . "," . LG_USER_LASTNAME . "," .LG_USER_ACTIVE . "," . LG_USER_CREATED . ")" .
                         " VALUES ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', '" . $_POST['email'] . "', '" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', 1 ,NOW())";
                   
      $qry = myQuery($sql);
      
      
      /*
      $subject = "A New Member Has Signed Up On Larry's Garage";
      $to = "kent@winfieldstudios.com";
      $message = "<p>Please review the following information:</p><p>";
      $message .= "Name: " . $_POST['firstname'] . " " . $_POST['lastname'] . "<br/>";
      $message .= "Email: " . $_POST['email'] . "<br/>";
      $message .= "Username: " . $_POST['username'] . "<br/>";
      $message .= "Date: " . date("m-d-Y g:i a", time()) . "</p>";
      
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'To: Kent Blodgett <kent@winfieldstudios.com>' . "\r\n";
      $headers .= 'From: Larry\'s Garage Registration <registration@thecarnival.org>' . "\r\n";

      mail($to,$subject,$message,$headers);
      
      */
      $l = new Login();
      $l->loginuser($_POST['username'],md5($_POST['password']),"/register_Thank_you/");
      
      }
    }

}

?>