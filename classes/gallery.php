<?php
/*
 * Created on July 26, 2007
 *
 * @Author: Kent W Blodgett
 * Project: X-Roads Family site
 */

class gallery {

  public $gallery_title;
  public $gallery_suammry;
  public $gallery_id;
  public $image_title;
  public $image_caption;
  public $account_id;
  public $message;
  public $image;
  private $db;
   
   function __construct(DB $db){
        $this->db = $db;
    }


  public function get_title() {
     $this->gallery_title = ($_POST['gallery_title']) ? $_POST['gallery_title'] : NULL;
     return $this->gallery_title;
   }

  public function get_summary() {
     $this->gallery_summary = ($_POST['gallery_summary']) ? $_POST['gallery_summary'] : NULL;
     return $this->gallery_summary;
   }

  public function get_account_id() {
    $this->account_id = $_SESSION['aid'];
    return $this->account_id;
   }

 public function get_gallery_id() {
     $this->gallery_id = ($_POST['gallery']) ? $_POST['gallery'] : NULL;
     return $this->gallery_id;
   }

 public function get_gallery_param_id() {
    $this->gallery_id = $_GET['param1'];
    return $this->gallery_id;
   }
   
 public function get_gallery_param2_id() {
    $this->gallery_id = $_GET['param2'];
    return $this->gallery_id;
   }


public function get_image_param_id() {
    $this->image_id = $_GET['param1'];
    return $this->image_id;
   }
   
 public function get_image_title() {
     $this->image_title = ($_POST['image_title']) ? $_POST['image_title'] : NULL;
     return $this->image_title;
   }

  public function get_image_caption() {
     $this->image_caption = ($_POST['image_caption']) ? $_POST['image_caption'] : NULL;
     return $this->image_caption;
   }

 public function get_image() {
     $this->image = ( $_FILES['filename']['tmp_name']) ?  $_FILES['filename']['tmp_name'] : NULL;
     return $this->image;
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
   
   

 public function add_gallery() {

     $gallery_title   = $this->get_title();
     $gallery_summary = $this->get_summary();
     $account_id      = $this->get_account_id();

     if(!$gallery_title) {
       $this->message ="Please enter in a subject or title for your gallery.";
       return $this->message;
      }
     elseif(!$gallery_summary) {
       $this->message ="Please enter in a summary/description for your gallery.";
       return $this->message;
      }
     elseif(!$account_id) {
       $this->message ="Yikes!  You are not logged in!  Please log in first before creating in your gallery";
       return $this->message;
      }
     else {
       $insert = $this->insert_gallery($account_id,$gallery_title,$gallery_summary);
       if($insert) {
         mkdir(CR_IMAGE_LOCATION . $insert);
         //chmod(CR_IMAGE_LOCATION . $insert, 0777);
         mkdir(CR_IMAGE_LOCATION . $insert . "/thumbs/");
         //chmod(CR_IMAGE_LOCATION . $insert . "/thumbs/", 0777);
         mkdir(CR_IMAGE_LOCATION . $insert . "/shadowed/");
         //chmod(CR_IMAGE_LOCATION . $insert . "/shadowed/", 0777);
       }
     }

   }

 public function add_image() {
   $gallery_id    = $this->get_gallery_id();
   $image_title   = $this->get_image_title();
   $image_caption = $this->get_image_caption();
   $image         = $this->get_image();

   if(!$gallery_id) {
       $this->message ="Please select a gallery from the drop down list.  If there are no galleries, you will have to create one first.";
       return $this->message;
      }
     elseif(!$image_title) {
       $this->message ="Please enter in a title for your image.";
       return $this->message;
      }
     elseif(!$image) {
       $this->message ="Please add an image to upload.";
       return $this->message;
      }
     else {
       $insert = $this->insert_image($gallery_id,$image_title,$image_caption);
       return $insert;
       }
 }


 public function get_gallery_list() {

    $account_id = $this->get_account_id();

    $sql = "SELECT " . CR_GALLERIES_GALLERY_ID . ", " . CR_GALLERIES_GALLERY_TITLE .
           " FROM " . CR_GALLERIES_TABLE .
           " WHERE " . CR_GALLERIES_ACCOUNT_ID . "=" . $account_id .
           " AND " . CR_GALLERIES_DELETED . " = 0 " .
           " ORDER BY " . CR_GALLERIES_GALLERY_TITLE;

    $qry = mysqli_query($this->db,$sql);

    return $qry;

 }

 public function get_gallery_info() {
 	$gallery_id = $this->get_gallery_param_id();

 	$sql = "SELECT g." . CR_GALLERIES_GALLERY_TITLE . ", g." . CR_GALLERIES_GALLERY_SUMMARY . ", g." . CR_GALLERIES_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME .
           " FROM "  . CR_GALLERIES_TABLE . " g " .
           " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON g." . CR_GALLERIES_ACCOUNT_ID . " = ua." . CR_USER_ACCOUNT_ACCOUNT_ID .
           " WHERE g." . CR_GALLERIES_GALLERY_ID . " = " . $gallery_id . 
           " AND g." . CR_GALLERIES_DELETED . " = 0";

    $qry = mysqli_query($this->db,$sql);

    return $qry;

 }

 public function galleries() {
   $sql = "SELECT g." . CR_GALLERIES_GALLERY_ID . ", g." . CR_GALLERIES_GALLERY_TITLE . ", g." . CR_GALLERIES_GALLERY_SUMMARY . ", g." . CR_GALLERIES_ACCOUNT_ID . ", g." . CR_GALLERIES_CREATED .", gi." . CR_GALLERY_IMAGE_IMAGE_ID . ", ua." . CR_USER_ACCOUNT_USERNAME .
             " FROM " . CR_GALLERIES_TABLE . " g " .
             " LEFT JOIN " . CR_GALLERY_IMAGE_TABLE . " gi ON g." . CR_GALLERY_IMAGE_GALLERY_ID . " = gi." . CR_GALLERIES_GALLERY_ID .
             " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON g." . CR_GALLERIES_ACCOUNT_ID . " = ua." . CR_USER_ACCOUNT_ACCOUNT_ID . 
             " WHERE g." . CR_GALLERIES_DELETED . " = 0";

   $qry = mysqli_query($this->db,$sql);

   return $qry;

 }


public function get_gallery_contents() {
   $gallery_id    = $this->get_gallery_param_id();

   $sql = "SELECT " . CR_GALLERY_IMAGE_IMAGE_ID . ", " . CR_GALLERY_IMAGE_IMAGE_TITLE . ", " . CR_GALLERY_IMAGE_IMAGE_CAPTION . ", " . CR_GALLERY_IMAGE_IMAGE_ORDER . ", " . CR_GALLERY_IMAGE_CREATED . ", " . CR_GALLERY_IMAGE_UPDATED .
          " FROM " . CR_GALLERY_IMAGE_TABLE .
          " WHERE " . CR_GALLERY_IMAGE_GALLERY_ID . "=" . $gallery_id .
          " ORDER BY " . CR_GALLERY_IMAGE_IMAGE_ORDER ;

   $qry = mysqli_query($this->db,$sql);

   return $qry;
}


 public function add_comment() {
    
    $uid = ($this->get_account_id() > 0) ? $this->get_account_id(): 0;
    $gid = $this->get_gallery_param_id();
   
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
       $insert = $this->insert_comment($gid,$uid,$comment_title,$comment_author,$comment_content);
       
     }
    
  
  }
  
private function insert_comment($gid,$uid,$comment_title,$comment_author,$comment_content) {
   $sql = "INSERT INTO " . CR_COMMENTS_TABLE .
          " (" . CR_COMMENTS_GALLERY_ID . "," . CR_COMMENTS_ACCOUNT_ID . ", " . CR_COMMENTS_TITLE . ", " .  CR_COMMENTS_AUTHOR . ", " . CR_COMMENTS_COMMENT . ")" .
          " VALUES (" . $gid . "," . $uid . ",'" . $comment_title . "','" . $comment_author . "','". $comment_content . "')";
   $qry = mysqli_query($sql) or die (mysql_error());
   return $qry;
 
 }
 
 
 public function get_comments() {
   $gid = $this->get_gallery_param_id();
   
   if($gid) {
     $sql = "SELECT c." . CR_COMMENTS_COMMENT_ID . ", c." . CR_COMMENTS_ACCOUNT_ID . ", c." . CR_COMMENTS_TITLE . ", c." . CR_COMMENTS_AUTHOR .", c." . CR_COMMENTS_COMMENT . ", c." . CR_COMMENTS_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME . 
            " FROM ".  CR_COMMENTS_TABLE . " c " .
            " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON c." . CR_GALLERIES_ACCOUNT_ID . "=ua." . CR_USER_ACCOUNT_ACCOUNT_ID.
            " WHERE " . CR_COMMENTS_GALLERY_ID . " = " . $gid;
     $qry = mysqli_query($this->db,$sql);
     return $qry;
   
   }  
  }


 private function insert_gallery($account_id,$title,$summary) {

       $sql = "INSERT INTO " . CR_GALLERIES_TABLE .
              " (" . CR_GALLERIES_ACCOUNT_ID . ", " . CR_GALLERIES_GALLERY_TITLE . ", " . CR_GALLERIES_GALLERY_SUMMARY . ") " .
              " VALUES (" . $account_id . ", '" . $title . "', '" . $summary . "')";

       $qry = mysqli_query($this->db,$sql);

       $id = mysqli_insert_id();
       return $id;

   }

 private function insert_image($gallery_id,$title,$caption="") {

       $sql = "INSERT INTO " . CR_GALLERY_IMAGE_TABLE .
              " (" . CR_GALLERY_IMAGE_GALLERY_ID . ", " . CR_GALLERY_IMAGE_IMAGE_TITLE . ", " . CR_GALLERY_IMAGE_IMAGE_CAPTION . ") " .
              " VALUES (" . $gallery_id . ", '" . $title . "', '" . $caption . "')";

       $qry = mysqli_query($this->db,$sql);

       $id = mysqli_insert_id();
       return $id;

   }


 private function count_galleries() {
     $sql = "SELECT COUNT(*) AS cnt " .
            " FROM " . CR_GALLERIES_TABLE .
            " WHERE " . CR_GALLERIES_DELETED . " = 0";
            
     $res = mysqli_query($this->db,$sql);
     $obj = $res->fetch_object();
     return $obj->cnt;
   }
   
 
 public function my_galleries() {
 
   $account_id = $this->get_account_id();
 
   $sql = "SELECT g." . CR_GALLERIES_GALLERY_ID . ", g." . CR_GALLERIES_GALLERY_TITLE . ", g." . CR_GALLERIES_GALLERY_SUMMARY . ", g." . CR_GALLERIES_CREATED .", gi." . CR_GALLERY_IMAGE_IMAGE_ID . 
             " FROM " . CR_GALLERIES_TABLE . " g " .
             " LEFT JOIN " . CR_GALLERY_IMAGE_TABLE . " gi ON g." . CR_GALLERY_IMAGE_GALLERY_ID . " = gi." . CR_GALLERIES_GALLERY_ID .
             " WHERE g." . CR_GALLERIES_ACCOUNT_ID . " = " . $account_id .
             " AND g." . CR_GALLERIES_DELETED . " = 0";

   $qry = mysqli_query($this->db,$sql);

   return $qry;

 }
 
 

public function home_galleries() {
 
  $cnt = $this->count_galleries();
  $limit = ($cnt-3 > 0) ? $cnt-3 : 0;
  $sql = "SELECT g." . CR_GALLERIES_GALLERY_ID . ", g." . CR_GALLERIES_GALLERY_TITLE . ", g." . CR_GALLERIES_GALLERY_SUMMARY . ", g." . CR_GALLERIES_ACCOUNT_ID . ", g." . CR_GALLERIES_CREATED .", gi." . CR_GALLERY_IMAGE_IMAGE_ID . ", ua." . CR_USER_ACCOUNT_USERNAME .
             " FROM " . CR_GALLERIES_TABLE . " g " .
             " RIGHT JOIN " . CR_GALLERY_IMAGE_TABLE . " gi ON g." . CR_GALLERY_IMAGE_GALLERY_ID . " = gi." . CR_GALLERIES_GALLERY_ID .
             " RIGHT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON g." . CR_GALLERIES_ACCOUNT_ID . " = ua." . CR_USER_ACCOUNT_ACCOUNT_ID . 
             " WHERE g." . CR_GALLERIES_DELETED . " = 0" .
             " GROUP BY " . CR_GALLERIES_GALLERY_ID . "  LIMIT " . $limit . ", 3" ;

   $qry = mysqli_query($this->db,$sql);
   return $qry;

 }
 

private function get_gallery_user_id($gid) {
   $sql = "SELECT " .  CR_GALLERIES_ACCOUNT_ID . " AS aid " .
          " FROM " . CR_GALLERIES_TABLE . 
          " WHERE " . CR_GALLERIES_GALLERY_ID . " = " . $gid;
          
   $qry = mysqli_query($this->db,$sql);
   $aid_obj = $qry->fetch_object();
   var_dump($aid_obj);
   
   return $aid_obj;
   
 }
 
 
public function delete_gallery() {
  $gid = $this->get_gallery_param_id();
  $aid = $this->get_account_id();
  $guid = $this->get_gallery_user_id($gid);
  
  if($aid == $guid) {
     $sql = "UPDATE " . CR_GALLERIES_TABLE . 
           " SET " . CR_GALLERIES_DELETED . "=1" .
           " WHERE " . CR_GALLERIES_GALLERY_ID . " = " . $gid;
    $qry = mysqli_query($this->db,$sql);
    
    /*$sql = "DELETE FROM " . CR_COMMENTS_TABLE  .
           " WHERE " . CR_COMMENTS_GALLERY_ID . " = " . $gid;
    $qry = mysql_query($sql) or die (mysql_error());*/
    
    }
  } 


public function delete_image() {
   $iid = $this->get_image_param_id();
   $gid = $this->get_gallery_param2_id();
   $aid = $this->get_account_id();
   $guid = $this->get_gallery_user_id($gid);
   
   if($aid == $guid) {
      $sql = "DELETE FROM " . CR_GALLERY_IMAGE_TABLE . 
           " WHERE " . CR_GALLERY_IMAGE_IMAGE_ID . " = " . $iid;
      $qry = mysqli_query($this->db,$sql);
   
   
   }

}


public function update_gallery() {
  $gid = $this->get_gallery_id();
  $aid = $this->get_account_id();
  $guid = $this->get_gallery_user_id($gid);

 if($aid == $guid) {
     $this->update_main($_POST['gallery_title'],$_POST['gallery_summary'],$gid);
     $this->update_images($gid);
 
   }

 }


private function update_main($title,$summary,$gid) {

   $sql = "UPDATE " . CR_GALLERIES_TABLE . 
          " SET " . CR_GALLERIES_GALLERY_TITLE . "='" . $title . "'," . CR_GALLERIES_GALLERY_SUMMARY . "='" . $summary . "'" .
          " WHERE " . CR_GALLERIES_GALLERY_ID . " = " . $gid;
          
   $qry = mysqli_query($this->db,$sql);
 }
 
 private function update_images($gid) {
   
    $cnt = count($_POST['title']);
    $i = 1;
    foreach($_POST['title'] as $key=>$val) {
      $this->update_image($key,$val,$_POST['summary'][$key],$i);
      $i++;
    }
 
 }
 
 private function update_image($key,$title,$summary,$order) {
    $sql = "UPDATE " . CR_GALLERY_IMAGE_TABLE . 
          " SET " . CR_GALLERY_IMAGE_IMAGE_TITLE . "='" . $title . "'," . CR_GALLERY_IMAGE_IMAGE_CAPTION . "='" . $summary . "', " . CR_GALLERY_IMAGE_IMAGE_ORDER . "=" . $order . 
          " WHERE " . CR_GALLERY_IMAGE_IMAGE_ID . " = " . $key;
          
   $qry = mysqli_query($this->db,$sql);
 
 }


}


?>