<html>
<head>
<link rel="stylesheet" type="text/css" href="articles/abc.css">
</head>
<?php
$link="/article/c";
$link1="/article/c";
 for ($i=792;$i<=916;$i++)
 {  
    $link=$link.$i.".html";
    $link1=$link1.$i.".php";
 	rename($link,$link1);
 	$link="";
    $link1="";
 }
?>
  </html>