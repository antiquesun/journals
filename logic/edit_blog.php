<?php

if($blog_content && $_SESSION['aid'] == $blog_content->{CR_BLOG_ACCOUNT_ID}) {
  $account_id   = $blog_content->{CR_BLOG_ACCOUNT_ID};
  $blog_title   = $blog_content->{CR_BLOG_TITLE};
  $blog_summary = $blog_content->{CR_BLOG_SUMMARY};
  $blog_body    = $blog_content->{CR_BLOG_BODY};
  $created      = $blog_content->{CR_BLOG_UPDATED};
}
else header("Location: /blogs/");

?>