 <form name="login" method="post" action="/">
     Login:<br/><br/>

     <div class="left">
      <ul>
       <li>Username:</li>
       <li>Password:</li>
      </ul>
     </div>

     <div class="right">
      <ul>
       <li><input type="text" name="username" value="" /></li>
       <li><input type="password" name="password" value="" /></li>
      </ul>
      
      <input id="login-button" type="image" name="login" src="/media/images/login.gif" alt="Login" />
      <!--input type="submit" name="submit" value="Login" /-->
     </div>
     <input type="hidden" name="login" value="1" />
    </form>