<?php

//video class

class Video
{
	public $uploaddir;
	public $localdir;
	public $vid_name;
	public $vid_file_dir;
	public $vid_file_id;
	
	
	public $thumbnail_name;
	public	$thumbnail_width;
	public $thumbnail_height;
	public $thumbnail_dir;
	
	public $thumbnail_img;
	public $thumbnail_localdir;
	
	public $message;
	private $db;
   
    function __construct(DB $db){
        $this->db = $db;
    }
    
	public function __get($var)
	{
		return $this->{$var};
	}
	
	public function __set($var, $val)
	{
		$this->{$var} = $val;
	}
	
   
   public function get_video_id() 
    {
      $this->vid_file_id = (isset($_GET['param1'])) ? $_GET['param1'] : NULL ;
      return $this->vid_file_id;
    }
	
   public function get_account_id() 
    {
       $this->account_id = $_SESSION['aid'];
       return $this->account_id;
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
   
   
   public function get_user_id() {
      $this->user_id = $_SESSION['aid'];
      return $this->user_id;
   }
    
   public function get_title() {
     $this->title = ($_POST['video_title']) ? $_POST['video_title'] : NULL;
     return $this->title;
   }
   
   public function get_summary() {
     $this->summary = ($_POST['video_summary']) ? $_POST['video_summary'] : NULL;
     return $this->summary;
   }
  
	
	
	public function save_video($width = 640, $height = 360, $bgColor = "#eaeaea")
	{
		$title   = $this->get_title();
        $summary = $this->get_summary();
		$this->uploaddir = "/home/silis/public_html/journals/media/videos/";
        $this->localdir = "/media/videos/";

        $theVideo = ""; //"outtest.flv";

        // thumbnail name must be set for upload function to create movie thumbnail

        $this->thumbnail_width = 174;
        $this->thumbnail_height = 130;
        $this->thumbnail_dir = "/home/silis/public_html/journals/media/thumbs/";
        $this->thumbnail_localdir = "/media/thumbs/shadowed/";
		
	    if(!$title) {
          $this->message ="Please enter in a subject or title for your video.";
          return $this->message;
        }
        //elseif ($_FILES['file']['size'] == NULL) {
        //  $this->message ="Please add your video.";
        //  return $this->message;
       // }
        else {
        
        
          if(isset($_FILES) && is_array($_FILES) && !empty($_FILES) )
            {
	          if($_FILES['file']['size'] > 500000000) {
                 $this->message = "Your movie file is too large.  Please make sure that it is below 500 MB.";
                 return $this->message;
                }
             elseif(!$vid = $this->upload($title,$summary)) 
	            {
	              $this->message = "There was a problem uploading the video.";
	              return $this->message;
	            }
	          else return $this->vid_file_id;
	
            }
         }
	}
	
  

   
   public function upload($title,$summary="")
	{
		$files = $_FILES;
		
	    $this->uploaddir = "/home/journals/media/videos/";
        //ini_set("session.gc_maxlifetime","10800");
        
        $this->vid_file_id = $this->insert_video($title,$summary);
        $uploadfile = $this->uploaddir . basename($files['file']['name']);
    
//var_dump($files);
 
       if(move_uploaded_file($files['file']['tmp_name'], $uploadfile))
         {
            $noExt = explode(".", $files['file']['name']);
            
            $name = $this->vid_file_id;
            $this->thumbnail_name = $name;
        
        
            if($noExt[1] == "wmv")
              {
		         exec("mencoder ". $this->uploaddir . $files['file']['name'] . " " . $this->uploaddir . $name . ".flv -of lavf -oac mp3lame -lameopts abr:br=56 -ovc lavc -lavcopts vcodec=flv:vbitrate=400:mbd=2:mv0:trell:v4mv:cbp:last_pred=3 -lavfopts i_certify_that_my_video_stream_does_not_use_b_frames -srate 22050");
        	     exec("flvtool2 -Uv " . $this->uploaddir . $name . ".flv " . $this->uploaddir . $name . ".flv");
        	
        	     $veed = $this->localdir . $name . ".flv";
        	     $this->vid_name = $name . "flv";

        	  }
            else
              {
              
		        exec("ffmpeg -i " . $this->uploaddir . $files['file']['name'] . "  -ar 22050 -ab 56 -f flv -b 700000 -qmin 3 -qdiff 0.5 -s 640x360 " . $this->uploaddir . $name . ".flv");
		        
		        $veed = $this->localdir . $name . ".flv";
        	    $this->vid_file_dir = $veed;

        	    $this->vid_name = $name . ".flv";
        	
             }
        
            if(isset($this->thumbnail_name))
        	  {
        		$this->thumbnail();
        	  }
        
        
            $rm_uploaded_file = $this->delVideo($uploadfile); //this is garbage collecion on uploaded file...
       
       
            return $veed;
        	
        }
    else
        {
			//var_dump($files);
			die("UPLOAD FAILED");
	    }


	}
	
	
	
	private function insert_video($title,$summary="") 
	  {
	     $uid = $this->get_account_id();
	     
	     $sql = "INSERT INTO " . CR_VIDEOS_TABLE . 
	            "(" . CR_VIDEOS_ACCOUNT_ID ."," . CR_VIDEOS_VIDEO_TITLE . ", " . CR_VIDEOS_VIDEO_SUMMARY . ")" .
	            " VALUES (" . $uid . ",'" . $title . "','" . $summary . "')";
         $qry = mysql_query($sql) or die (mysql_error());
         $lid = mysqli_insert_id();
         
         return $lid;
	
	  }
	  
   public function save_video_edit($vid) 
	  {
	    
	     $title   = $this->get_title();
         $summary = $this->get_summary();
	     
	     $sql = "UPDATE " . CR_VIDEOS_TABLE . 
	            " SET " . CR_VIDEOS_VIDEO_TITLE . "='" . $title . "'," . CR_VIDEOS_VIDEO_SUMMARY . "='" . $summary . "'" .
                " WHERE " . CR_VIDEOS_VIDEO_ID . " = " . $vid;
          
         $qry = mysqli_query($this->db,$sql);
        
         
         return $qry;
	
	  }
	
	
	public function thumbnail() 
	  {		
			
			$flvFile = $this->uploaddir . $this->vid_name;
			
			$file 	= $this->thumbnail_name;
			$width 	= $this->thumbnail_width;
			$height = $this->thumbnail_height;
			$dir	= $this->thumbnail_dir;
			
			if(isset($this->thumbnail_dir))
			{
				$thumbName = $dir . $file . ".jpg";

				exec("ffmpeg -y -i " . $flvFile . " -f mjpeg -ss 1 -vframes 1 -s " .$width."x".$height." -an " . $thumbName);
				
				
				$ds = new dropShadow(FALSE);
                $ds->setShadowPath('/home/silis/public_html/journals/media/images/shadow/');
                $ds->loadImage($thumbName);
                $ds->applyShadow('FFFFFF');
                $image_location = "/home/silis/public_html/journals/media/thumbs/shadowed/" . $file. ".jpg";
                $ds->saveShadow($image_location);
                
				$this->thumbnail_img = $this->thumbnail_localdir . $file . ".jpg";
			}
			else
			{
				die("Thumbnail failed: no thumbnail dir set");
			}
			
	}//thumbnail


	private function delVideo($file)
	{
		//$file must be full path
		
		if(file_exists($file))
		{
			unlink($file);
			return true;
		}
		else
		{
			$res = "This file does not exist.";
			return $res;
		}

	}
	
  
  
  private function get_video_user_id($vid) {
   $sql = "SELECT " .  CR_VIDEOS_ACCOUNT_ID . " AS aid " .
          " FROM " . CR_VIDEOS_TABLE . 
          " WHERE " . CR_VIDEOS_VIDEO_ID . " = " . $vid;
          
   $qry = mysql_query($sql) or die (mysql_error());
   $aid_obj = mysql_fetch_object($qry);
   $aid = $aid_obj->aid;
   
   return $aid;
   
 }
 
 private function count_videos() {
     $sql = "SELECT COUNT(*) AS cnt " .
            " FROM " . CR_VIDEOS_TABLE .
            " WHERE " . CR_VIDEOS_DELETED . " = 0";
            
     $res = mysqli_query($this->db,$sql);
     $obj = $res->fetch_object();
     return $obj->cnt;
   }
 
 
	
	public function delete_video() {
     $vid_id = $this->get_video_id();
     $aid    = $this->get_account_id();
     $vuid   = $this->get_video_user_id($vid_id);
  
     if($aid == $vuid) {
        $sql = "UPDATE " . CR_VIDEOS_TABLE . 
               " SET " . CR_VIDEOS_DELETED . "=1" .
               " WHERE " . CR_VIDEOS_VIDEO_ID . " = " . $vid_id;
        $qry = mysql_query($sql) or die (mysql_error());
    
    /*$sql = "DELETE FROM " . CR_COMMENTS_TABLE  .
           " WHERE " . CR_COMMENTS_GALLERY_ID . " = " . $gid;
    $qry = mysql_query($sql) or die (mysql_error());*/
    
    }
  } 
  
	
	public function get_video() 
	  {
	     $vid_id = $this->get_video_id();
	     
	     if($vid_id) 
	       {
	          $sql = "SELECT v." . CR_VIDEOS_VIDEO_ID . ", v." . CR_VIDEOS_ACCOUNT_ID . ", v." . CR_VIDEOS_VIDEO_TITLE . ", v." . CR_VIDEOS_VIDEO_SUMMARY . ", v." . CR_VIDEOS_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME .
              "  FROM " . CR_VIDEOS_TABLE . " v " .
              " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON v." . CR_VIDEOS_ACCOUNT_ID . "=ua." . CR_USER_ACCOUNT_ACCOUNT_ID .
              " WHERE " . CR_VIDEOS_VIDEO_ID. "=" . $vid_id;
       
              $qry = mysqli_query($this->db, $sql);
       
              return $qry;
	     
	       }
	  }
	
	
  
  public function videos () {
   $sql = "SELECT v." . CR_VIDEOS_VIDEO_ID . ", v." . CR_VIDEOS_VIDEO_TITLE . ", v." . CR_VIDEOS_VIDEO_SUMMARY . ", v." . CR_VIDEOS_ACCOUNT_ID . ", v." . CR_VIDEOS_CREATED .", ua." . CR_USER_ACCOUNT_USERNAME .
             " FROM " . CR_VIDEOS_TABLE . " v " .
             " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON v." . CR_VIDEOS_ACCOUNT_ID . " = ua." . CR_USER_ACCOUNT_ACCOUNT_ID . 
             " WHERE v." . CR_VIDEOS_DELETED . " = 0";

   $qry = mysqli_query($this->db,$sql);

   return $qry;

 }
 
 
 public function my_videos() {
 
   $account_id = $this->get_account_id();
 
   $sql = "SELECT v." . CR_VIDEOS_VIDEO_ID . ", v." . CR_VIDEOS_VIDEO_TITLE . ", v." . CR_VIDEOS_VIDEO_SUMMARY . ", v." . CR_VIDEOS_CREATED . 
             " FROM " . CR_VIDEOS_TABLE . " v " .
             " WHERE v." . CR_VIDEOS_ACCOUNT_ID . " = " . $account_id .
             " AND v." . CR_VIDEOS_DELETED . " = 0";

   $qry = mysqli_query($this->db,$sql);

   return $qry;

 }
 
 public function home_videos () {
   $cnt = $this->count_videos();
   $limit = ($cnt-3 > 0) ? $cnt-3 : 0;
   $sql = "SELECT v." . CR_VIDEOS_VIDEO_ID . ", v." . CR_VIDEOS_VIDEO_TITLE . ", v." . CR_VIDEOS_VIDEO_SUMMARY . ", v." . CR_VIDEOS_ACCOUNT_ID . ", v." . CR_VIDEOS_CREATED .", ua." . CR_USER_ACCOUNT_USERNAME .
             " FROM " . CR_VIDEOS_TABLE . " v " .
             " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON v." . CR_VIDEOS_ACCOUNT_ID . " = ua." . CR_USER_ACCOUNT_ACCOUNT_ID . 
             " WHERE v." . CR_VIDEOS_DELETED . " = 0" .
             " GROUP BY " . CR_VIDEOS_VIDEO_ID . " LIMIT "  . $limit . ", 3";

   $res = mysqli_query($this->db,$sql);
   return $res;

 }
 
	
  public function get_comments() {
       $vid_id = $this->get_video_id();
   
       if($vid_id) {
          $sql = "SELECT c." . CR_COMMENTS_COMMENT_ID . ", c." . CR_COMMENTS_ACCOUNT_ID . ", c." . CR_COMMENTS_TITLE . ", c." . CR_COMMENTS_AUTHOR .", c." . CR_COMMENTS_COMMENT . ", c." . CR_COMMENTS_CREATED . ", ua." . CR_USER_ACCOUNT_USERNAME . 
            " FROM ".  CR_COMMENTS_TABLE . " c " .
            " LEFT JOIN " . CR_USER_ACCOUNT_TABLE . " ua ON c." . CR_VIDEOS_ACCOUNT_ID . "=ua." . CR_USER_ACCOUNT_ACCOUNT_ID.
            " WHERE " . CR_COMMENTS_VIDEO_ID . " = " . $vid_id;
          $qry = mysqli_query($this->db,$sql);
          return $qry;
   
       }  
  }
  
  
   public function add_comment() {
    
    $uid = ($this->get_user_id() > 0) ? $this->get_user_id(): 0;
    $vid_id = $this->get_video_id();
    
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
       $insert = $this->insert_comment($vid_id,$uid,$comment_title,$comment_author,$comment_content);
       
     }
    
  
  }
  
 
 private function insert_comment($vid_id,$uid,$comment_title,$comment_author,$comment_content) {
   $sql = "INSERT INTO " . CR_COMMENTS_TABLE .
          " (" . CR_COMMENTS_VIDEO_ID . "," . CR_COMMENTS_ACCOUNT_ID . ", " . CR_COMMENTS_TITLE . ", " .  CR_COMMENTS_AUTHOR . ", " . CR_COMMENTS_COMMENT . ")" .
          " VALUES (" . $vid_id . "," . $uid . ",'" . $comment_title . "','" . $comment_author . "','". $comment_content . "')"; 
   $qry = mysql_query($sql) or die ("oops" . mysql_error());
   return $qry;
 
 }


 


}//Video


