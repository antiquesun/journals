<?php
 $db = new DB(CR_DBHOST, CR_DBLOGIN, CR_DBPASS, CR_DATABASE, null,"","");
 $l = new Login($db);
 $l->logout($_COOKIE['user_crfs']);
?>