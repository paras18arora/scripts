<html>
<head>
<link rel="stylesheet" type="text/css" href="articles/abc.css">
</head>

<?php

  include('ganon.php');
  $servername = "localhost";
 $username = "root";
 $password = "";


// Create connection
  $conn = mysqli_connect($servername, $username, $password,"indiareads");

// Check connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

   function article_no($url)
  {

  $servername = "localhost";
   $username = "root";
  $password = "";


// Create connection
  $conn = mysqli_connect($servername, $username, $password,"indiareads");

// Check connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
     $c=0;
    $i=0;
       $info1=array();
      $html = file_get_dom($url);

      foreach ($html('div.entry-content') as $element) {
         
      foreach($element('ul li a') as $ele)
      { $c=$c+1;
        if($c>140 && $c<146)
        {
        $link=$ele->href;
        $title=$ele->getPlainText();



        
     //  $info1=article_data($link);
       $sql = "UPDATE data SET keywords='C/C++ puzzles' WHERE id>=792 and id<=802";
       if($conn->query($sql))
        echo "success";

      }
    }
    

      
    }
    }
  function article_data($url)
  {   
      $html = file_get_dom($url);
       
      
      $info=array();
      foreach ($html('meta') as $element)
      {
    
        if($element->property=="og:description")
           $info[0]= $element->content;
        else if($element->property=="article:section")
           $info[1]= $element->content;
      }
      return $info;
     /*  foreach ($html('header.entry-header') as $element) {
        
        $data=$data.$element->getInnerText();
      } 
      
      foreach($html('div.entry-content') as $element) 
       // echo "<xmp>";
        {
           

          foreach($element('script') as $ad) // for deleting google ads script tag
            $ad->delete();
          foreach($element('ins') as $ad)  // for deleting google ads ins tag
            $ad->delete();

            $el = $element->getInnerText();

        $el = preg_replace('|\.[a-z\.0-9]+|i', 'indiareads.com', $el);  // for removing all digitalocean links and replacing them with indiareads
       $el = str_replace(array("geeksforgeeks","GEEKSFORGEEKS","GeeksforGeeks","Geeksforgeeks","geekforGeeks"),"IndiaReads",$el); // removing all geeksforgeeks text and replaced with IndiaReads 
        $el = str_replace(array('“','”'),'"',$el); 
        $el = str_replace(array("’"),"'",$el);           
         $data=$data.$el;
        
      
        fwrite($myfile, $data);
        fclose($myfile);
        */
     
           
       // }    


          
    }


    $url = "http://www.geeksforgeeks.org/c/";
    article_no($url);
    mysqli_close($conn);

  ?>

  </html>