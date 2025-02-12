<div id="mainContainer">

 <div id="pagetitle">Registration</div>

 <p>Some intro text about the registration process.</p>
 <form name="register" method="post" action="/register/">
 
 <div class="left">
  <ul>
   <li>Username:</li>
   <li>Password:</li>
   <li>Re-type Rassword:</li>
   <li>Email:</li>
   <li>First Name:</li>
   <li>Last Name:</li>
  </ul>
 </div>
 
 
 <div class="right">
  <ul>
   <li><input type="text" name="username" value="<?=$_POST['username']?>" /></li>
   <li><input type="password" name="password" value="<?=$_POST['password']?>" /></li>
   <li><input type="password" name="repassword" value="<?=$_POST['repassword']?>" /></li>
   <li><input type="text" name="email" value="<?=$_POST['email']?>" /></li>
   <li><input type="text" name="firstname" value="<?=$_POST['firstname']?>" /></li>
   <li><input type="text" name="lastname" value="<?=$_POST['lastname']?>" /></li>
  </ul>
  <br/>
  <input type="submit" name="submit" value="Register" />
 </div>
 
 
 </form>
 


</div>


 <div id="error"><?=$errMess?><br/></div>