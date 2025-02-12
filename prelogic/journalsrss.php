<?

$sql = "SELECT * FROM " .  CR_BLOG_TABLE .
       " WHERE " . CR_BLOG_DELETED . " !=1 ". 
       " ORDER BY " . CR_BLOG_CREATED;

$qry = mysql_query($sql) or die(mysql_error());

$rssfeed = '<?xml version="1.0" encoding="ISO-8859-1" ?>
             <rss version="2.0">
              <channel>
               <title>Family Journals</title>
               <link>http://www.familyxroads.com</link>
               <description>Latest Family Journals Content</description>
               <language>en-us</language>
               <copyright>Copyright ' . date("Y", time()) . ' Family Journals</copyright>
               <docs></docs>
               <lastBuildDate>' . date("m-d-Y", time()) . '</lastBuildDate>';


while($res = mysql_fetch_array($qry)) {
  
  $title = $res[CR_BLOG_TITLE];
  $desc = $res[CR_BLOG_SUMMARY];
  $date = $res[CR_BLOG_CREATED];
  $blog_id = $res[CR_BLOG_BLOG_ID];

  $rssfeed .= '<item>';
  $rssfeed .= '<title>' . $title . '</title>';
  $rssfeed .= '<description>' . $desc . '</description>';
  $rssfeed .= '<link>http://journals.thecarnival.org/blog/' . $blog_id . '/</link>';
  $rssfeed .= '<author>Family X-Roads</author>';
  $rssfeed .= '<pubdate>' . $date . '</pubdate>';
  $rssfeed .= '</item>';

}

$rssfeed .= "</channel>
           </rss>
          </xml>";
          
$filename ="./rss/fxrrss.xml";
$fh=fopen($filename,"w");
fwrite($fh,$rssfeed);
fclose($fh); 

header("Location:/");


//echo $rssfeed;
?>