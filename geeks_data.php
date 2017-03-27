<html>
<head>
<link rel="stylesheet" type="text/css" href="articles/abc.css">
</head>
<?php
  include('ganon.php');
  function article_data($url,$id)
  {   $path='<link rel="stylesheet" type="text/css" href="abc.css">';
      $path1='<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />';
      $html = file_get_dom($url);
        $filename="business_articles/"."b".$id.".php";
     echo $id;
      $data="";
      $data=$data.$path;
      $data=$data.$path1;
       $myfile = fopen($filename, "w") or die("Unable to open file!");
 /*   foreach ($html('meta') as $element) {
    
        if($element->property=="og:description")
       //   $data=$data.$element->content;
        else if($element->property=="og:title")
       //   $data=$data.$element->content;
      }
      */
       foreach ($html('div.bodycopy') as $element) {
        echo $element->getInnerText();
        $data=$data.($element->getInnerText());
      } 
      


      //  $el = preg_replace('|\.[a-z\.0-9]+|i', 'indiareads.com', $el);  // for removing all digitalocean links and replacing them with indiareads
    //   $el = str_replace(array("geeksforgeeks","GEEKSFORGEEKS","GeeksforGeeks","Geeksforgeeks","geekforGeeks"),"IndiaReads",$el); // removing all geeksforgeeks text and replaced with IndiaReads 
        
        
      
        fwrite($myfile, $data);
        fclose($myfile);
     
           
        }    


          
    
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "indiareads";
 
// Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT link,id FROM business_datas where id=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       article_data($row["link"],$row["id"]);
       
    }
} else {
    echo "0 results";
}
    
    
  ?>

  </html>