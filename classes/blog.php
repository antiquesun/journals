<?php
/*
 * Created on July 15, 2007
 *
 * @Author: Kent W Blodgett
 * Project: X-Roads Family site
 */
 
Class blog {
   
   public $body;
   public $title;
   public $summary;
   public $message;
   public $user_id;
   public $topten;
   public $cnt;
   public $blog_id;
   public $comment_title;
   public $comment_content;
   
   private $db;
   
   function __construct(DB $db){
        $this->db = $db;
    }

   public function get_title() {
     $this->title = ($_POST['title']) ? $_POST['title'] : NULL;
     return $this->title;
   }
   
   public function get_summary() {
     $this->summary = ($_POST['summary']) ? $_POST['summary'] : NULL;
     return $this->summary;
   }
   
   public function get_body() {
     $this->body = ($_POST['content']) ? $_POST['content'] : NULL;
     return $this->body;
   }
  
  public function get_user_id() {
    $this->user_id = $_SESSION['aid'];
    return $this->user_id;
   }
   
  public function get_blog_id() {
    $this->blog_id = $_GET['param1'];
    return $this->blog_id;
   }
 
  public function get_comment_title() {
     $this->comment_title = ($_POST['comment_title']) ? $_POST['comment_title'] : NULL;
     return $this->comment_title;
   }
  
  public function get_comment_author() {
     $this->comment_author = ($_POST['comment_author']) ? $_POST['comment_author'] : NULL;
     return $this->comment_author;
   }
   
  public function get_comment_content() {
     $this->comment_content = ($_POST['comment_content']) ? $_POST['comment_content'] : NULL;
     return $this->comment_content;
   }
  
   
   public function add_blog() {
   
     $title   = $this->get_title();
     $summary = $this->get_summary();
     $body    = $this->get_body();
     $user_id = $this->get_user_id();

     if(!$title) {
       $this->message ="Please enter in a subject or title for your blog entry.";
       return $this->message;
      }
     elseif(!$summary) {
       $this->message ="Please enter in a summary for your blog entry.";
       return $this->message;
      }
     elseif(!$body) {
       $this->message ="Please enter in some content in the area called 'Body' for your blog entry.";
       return $this->message;
      }
     elseif(!$user_id) {
       $this->message ="Yikes!  You are not logged in!  Please log in first before entering in your blog - please save your text before you leave this page!";
       return $this->message;
      }
     else {
       $insert = $this->insert_blog($user_id,$title,$summary,$body);
       
     }
   
   }
   
   
    public function save_blog() {
   
     $title   = $this->get_title();
     $summary = $this->get_summary();
     $body    = $this->get_body();
     $blog_id = $this->get_blog_id();

     if(!$title) {
       $this->message ="Please enter in a subject or title for your blog entry.";
       return $this->message;
      }
     elseif(!$summary) {
       $this->message ="Please enter in a summary for your blog entry.";
       return $this->message;
      }
     elseif(!$body) {
       $this->message ="Please enter in some content in the area called 'Body' for your blog entry.";
       return $this->message;
      }
     elseif(!$blog_id) {
       $this->message ="Yikes!  ";
       return $this->message;
      }
     else {
       $insert = $this->save_this_blog($blog_id,$title,$summary,$body);
       
     }
   
   }
   
   private function count_blogs() {
     $sql = "SELECT COUNT(*) AS cnt " .
            " FROM " . CR_BLOG_TABLE .
            " WHERE " . CR_BLOG_DELETED . " = 0";
         
     $res = mysqli_query($this->db,$sql);
     $obj = $res->fetch_object();
     return $obj->cnt;
   }
   
   
   private function insert_blog($account_id,$title,$summary,$body) {
       
       $sql = "INSERT INTO " . CR_BLOG_TABLE . 
              " (" . CR_BLOG_ACCOUNT_ID . ", " . CR_BLOG_TITLE . ", " . CR_BLOG_SUMMARY . ", " . CR_BLOG_BODY . ") " .
              " VALUES (" . $account_id . ", '" . $title . "', '" . $summary . "', '" . $body . "')";
       
       $qry = mysql_query($sql) or die (mysql_error());
       
   }
   
   
   
   private function save_this_blog($blog_id,$title,$summary,$body) {
       
       $sql = "UPDATE " . CR_BLOG_TABLE . 
              " SET " . CR_BLOG_TITLE . " = \"" . $title . "\", " . CR_BLOG_SUMMARY . " = \"" . $summary . "\", " . CR_BLOG_BODY . " = \"" . $body . "\"" .
              " WHERE " . CR_BLOG_BLOG_ID . " = " . $blog_id;
       
       $qry = mysqli_query($this->db,$sql);
       
   }
   
   public function topten_blogs() {
       $cnt  = $this->count_blogs();
       $limit = ($cnt > 10 ) ? $cnt-10 : 0;
       $sql = "SELECT b." . CR_BLOG_BLOG_ID . ", b." . CR_BLOG_ACCOUNT_ID . ", b." . CR_BLOG_TITLE . ", b." . CR_BLOG_SUMMARY . ", b." . CR_BLOG_BODY . ", b." . CR_BLOG_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME .
              " FROM " . CR_BLOG_TABLE . " b " .
              " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON b." . CR_BLOG_ACCOUNT_ID . "=ua." . CR_BLOG_ACCOUNT_ID .
              " WHERE b." . CR_BLOG_DELETED . " = 0" .
              " LIMIT " . $limit . "," . $cnt;
       
       $qry = mysqli_query($this->db,$sql);
       $obj = $qry->fetch_object();
       return $obj;
   
   }
   
   
   public function get_blogs() {
       
       $sql = "SELECT b." . CR_BLOG_BLOG_ID . ", b." . CR_BLOG_ACCOUNT_ID . ", b." . CR_BLOG_TITLE . ", b." . CR_BLOG_SUMMARY . ", b." . CR_BLOG_BODY . ", b." . CR_BLOG_UPDATED . ", ua." . CR_USER_ACCOUNT_USERNAME .
              " FROM " . CR_BLOG_TABLE . " b " .
              " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON b." . CR_BLOG_ACCOUNT_ID . "=ua." . CR_BLOG_ACCOUNT_ID .
              " WHERE b." . CR_BLOG_DELETED . " != 1";
       
       $qry = mysqli_query($this->db,$sql);
       return $qry;
   
   }
   
     
   
   public function my_blogs() {
       $aid = $this->get_user_id();
       $sql = "SELECT " . CR_BLOG_BLOG_ID . ", " . CR_BLOG_TITLE . ", " . CR_BLOG_SUMMARY . ", " . CR_BLOG_BODY . ", " . CR_BLOG_UPDATED . 
              "  FROM " . CR_BLOG_TABLE . " b " .
              " WHERE " . CR_BLOG_ACCOUNT_ID . " = " . $aid .
              " AND " . CR_BLOG_DELETED . " !=1";
       
       $qry = mysqli_query($this->db,$sql);
       return $qry;
   
   }
   
   
   public function home_blogs() {
       $cnt  = $this->count_blogs();
       $limit = ($cnt-2 > 0) ? $cnt-2 : 0;
       $sql = "SELECT b." . CR_BLOG_BLOG_ID . ", b." . CR_BLOG_ACCOUNT_ID . ", b." . CR_BLOG_TITLE . ", b." . CR_BLOG_SUMMARY . ", b." . CR_BLOG_BODY . ", b." . CR_BLOG_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME .
              " FROM " . CR_BLOG_TABLE . " b " .
              " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON b." . CR_BLOG_ACCOUNT_ID . "=ua." . CR_BLOG_ACCOUNT_ID .
              " WHERE b." . CR_BLOG_DELETED . " != 1" .
              " LIMIT " . $limit . ",2" ;	
       $res = mysqli_query($this->db,$sql);
       return $res;
   
   }
   
   
   public function get_blog_contents() {
     $bid = $this->get_blog_id();
     if($bid) {
       $sql = "SELECT b." . CR_BLOG_BLOG_ID . ", b." . CR_BLOG_ACCOUNT_ID . ", b." . CR_BLOG_TITLE . ", b." . CR_BLOG_SUMMARY . ", b." . CR_BLOG_BODY . ", b." . CR_BLOG_UPDATED . ", ua." . CR_USER_ACCOUNT_USERNAME .
              "  FROM " . CR_BLOG_TABLE . " b " .
              " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON b." . CR_BLOG_ACCOUNT_ID . "=ua." . CR_USER_ACCOUNT_ACCOUNT_ID .
              " WHERE " . CR_BLOG_BLOG_ID. "=" . $bid;
       
       $qry = mysqli_query($this->db,$sql);
       $obj = $qry->fetch_object();
       return $obj;
       
       }
     
     
   }
   
  
  public function add_comment() {
    
    $uid = ($this->get_user_id() > 0) ? $this->get_user_id(): 0;
    $bid = $this->get_blog_id();
    
    $comment_content = $this->get_comment_content();
    $comment_title   = $this->get_comment_title();
    $comment_author  = $this->get_comment_author();
    
    if(!$comment_title) {
       $this->message ="Please enter in a subject or title for your comment.";
       return $this->message;
      }
    elseif(!$comment_content) {
       $this->message ="Please enter your comment.";
       return $this->message;
      }
    elseif($uid == 0 && !$comment_author) {
       $this->message ="Please enter your name in the author field.";
       return $this->message;
      }
     else {
       $insert = $this->insert_comment($bid,$uid,$comment_title,$comment_author,$comment_content);
       
     }
    
  
  }
  
 
 private function insert_comment($bid,$uid,$comment_title,$comment_author,$comment_content) {
   $sql = "INSERT INTO " . CR_COMMENTS_TABLE .
          " (" . CR_COMMENTS_BLOG_ID . "," . CR_COMMENTS_ACCOUNT_ID . ", " . CR_COMMENTS_TITLE . ", " .  CR_COMMENTS_AUTHOR . ", " . CR_COMMENTS_COMMENT . ")" .
          " VALUES (" . $bid . "," . $uid . ",'" . $comment_title . "','" . $comment_author . "', '". $comment_content . "')"; 
   $qry = mysql_query($sql) or die ("woah!" . mysql_error());
   return $qry;
 
 }
 
 private function get_blog_user_id($bid) {
   $sql = "SELECT " .  CR_BLOG_ACCOUNT_ID . " AS aid " .
          " FROM " . CR_BLOG_TABLE . 
          " WHERE " . CR_BLOG_BLOG_ID . " = " . $bid;
          
   $qry = mysql_query($sql) or die (mysql_error());
   $aid_obj = mysql_fetch_object($qry);
   $aid = $aid_obj->aid;
   
   return $aid;
   
 }
 
 
 public function get_comments() {
   $bid = $this->get_blog_id();
   
   if($bid) {
     $sql = "SELECT c." . CR_COMMENTS_COMMENT_ID . ", c." . CR_COMMENTS_ACCOUNT_ID . ", c." . CR_COMMENTS_TITLE . ", c." . CR_COMMENTS_AUTHOR .", c." . CR_COMMENTS_COMMENT . ", c." . CR_COMMENTS_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME . 
            " FROM ".  CR_COMMENTS_TABLE . " c " .
            " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON c." . CR_BLOG_ACCOUNT_ID . "=ua." . CR_USER_ACCOUNT_ACCOUNT_ID.
            " WHERE " . CR_COMMENTS_BLOG_ID . " = " . $bid;
     $qry = mysqli_query($this->db,$sql);
     return $qry;
   
   }
 
 }
 
public function delete_blog() {
  $bid  = $this->get_blog_id();
  $aid  = $this->get_user_id();
  $gbid = $this->get_blog_user_id($bid);
  
  if($aid == $gbid) {
   // $sql = "DELETE FROM " . CR_BLOG_TABLE . 
   //        " WHERE " . CR_BLOG_BLOG_ID . " = " . $bid;
   
    $sql = "UPDATE " . CR_BLOG_TABLE . 
           " SET " . CR_BLOG_DELETED . " = 1 " .
           " WHERE " . CR_BLOG_BLOG_ID . " = " . $bid;
           
    $qry = mysql_query($sql) or die (mysql_error());
    
    $sql2 = "UPDATE " . CR_COMMENTS_TABLE  .
           " SET " . CR_COMMENTS_DELETED . " = 1 " .
           " WHERE " . CR_COMMENTS_BLOG_ID . " = " . $bid;
           
    $qry2 = mysql_query($sql2) or die (mysql_error());
   }

}
  
   
}



?>