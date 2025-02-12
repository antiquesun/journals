<?php
/*
 * Created on 
 *
 * @Author: Kent W Blodgett
 * Project: The Carnival
 * 
 * mysql.php
 * this is for the credentials of the sql connection
 */


Class DB extends mysqli {

 public function __construct($host, $user, $pass, $db, $port, $socket, $charset) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        return parent::__construct($host, $user, $pass, $db, $port, $socket);
       // $this->set_charset($charset);
    }
}
?>
