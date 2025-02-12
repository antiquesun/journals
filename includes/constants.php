<?php
/* 
 * Created on June 30, 2009
 *
 * @Author: Kent W Blodgett
 * Project: The Carnival
 * constants.php
 */
 define("CR_SALT", 'journals');
 
 define("CR_DBHOST", "localhost"); 
 define("CR_DBLOGIN","silis");
 define("CR_DBPASS","s4mgr1nt3r");
 define("CR_DATABASE","journals");
 define("CR_SESSION_PATH","/home/winfieldstudios.com/journals/sessions");
 
 define("CR_IMAGE_LOCATION", "/home/winfieldstudios.com/journals/media/galleries/");
 define("CR_PROFILE_IMAGE_LOCATION", "/home/winfieldstudios.com/journals/media/profile/");


 /***************************************/
 /************   DB Tables  *************/
 /***************************************/
 
 //User Account
 define("CR_USER_ACCOUNT_TABLE", "UserAccount");
 define("CR_USER_ACCOUNT_ACCOUNT_ID", "account_id");
 define("CR_USER_ACCOUNT_USERNAME", "username");
 define("CR_USER_ACCOUNT_EMAIL", "email");
 define("CR_USER_ACCOUNT_PASSWORD", "password");
 define("CR_USER_ACCOUNT_FIRSTNAME", "first_name");
 define("CR_USER_ACCOUNT_LASTNAME", "last_name");
 define("CR_USER_ACCOUNT_ACTIVATED", "activated");
 define("CR_USER_ACCOUNT_CREATED", "created");
 define("CR_USER_ACCOUNT_UPDATED", "updated");
 
 //Blog
 
 define("CR_BLOG_TABLE", "Blogs");
 define("CR_BLOG_BLOG_ID", "blog_id");
 define("CR_BLOG_ACCOUNT_ID", "account_id");
 define("CR_BLOG_TITLE", "title");
 define("CR_BLOG_SUMMARY", "summary");
 define("CR_BLOG_USERNAME", "username");
 define("CR_BLOG_BODY", "body");
 define("CR_BLOG_CREATED", "created");
 define("CR_BLOG_UPDATED", "updated");
 define("CR_BLOG_DELETED", "deleted");
 
 //Comments
 
 define("CR_COMMENTS_TABLE", "Comments");
 define("CR_COMMENTS_COMMENT_ID", "comment_id");
 define("CR_COMMENTS_BLOG_ID", "blog_id");
 define("CR_COMMENTS_GALLERY_ID", "gallery_id");
 define("CR_COMMENTS_VIDEO_ID", "video_id");
 define("CR_COMMENTS_ACCOUNT_ID", "account_id");
 define("CR_COMMENTS_AUTHOR", "author");
 define("CR_COMMENTS_TITLE", "title");
 define("CR_COMMENTS_COMMENT", "comment");
 define("CR_COMMENTS_CREATED", "created");
 define("CR_COMMENTS_UPDATED", "updated");
 define("CR_COMMENTS_DELETED", "deleted");
 
 
 // Galleries
 
 define("CR_GALLERIES_TABLE", "Galleries");
 define("CR_GALLERIES_GALLERY_ID", "gallery_id");
 define("CR_GALLERIES_ACCOUNT_ID", "account_id");
 define("CR_GALLERIES_GALLERY_TITLE", "gallery_title");
 define("CR_GALLERIES_GALLERY_SUMMARY", "gallery_summary");
 define("CR_GALLERIES_CREATED", "created");
 define("CR_GALLERIES_UPDATED", "updated");
 define("CR_GALLERIES_DELETED", "deleted");
 
 
 // Gallery Image
 
 define("CR_GALLERY_IMAGE_TABLE", "GalleryImage");
 define("CR_GALLERY_IMAGE_IMAGE_ID", "image_id");
 define("CR_GALLERY_IMAGE_GALLERY_ID", "gallery_id");
 define("CR_GALLERY_IMAGE_IMAGE_TITLE", "image_title");
 define("CR_GALLERY_IMAGE_IMAGE_CAPTION", "image_caption");
 define("CR_GALLERY_IMAGE_IMAGE_ORDER", "image_order");
 define("CR_GALLERY_IMAGE_CREATED", "created");
 define("CR_GALLERY_IMAGE_UPDATED", "updated");
 
 
 // Videos
 
 define("CR_VIDEOS_TABLE", "Videos");
 define("CR_VIDEOS_VIDEO_ID", "video_id");
 define("CR_VIDEOS_ACCOUNT_ID", "account_id");
 define("CR_VIDEOS_VIDEO_TITLE", "video_title");
 define("CR_VIDEOS_VIDEO_SUMMARY", "video_summary");
 define("CR_VIDEOS_CREATED", "created");
 define("CR_VIDEOS_UPDATED", "updated");
 define("CR_VIDEOS_DELETED", "deleted");
 
?>