<html>
<head>

</head>

<?php
ini_set('max_execution_time', 300);
  include('ganon.php');
  $servername = "localhost";
 $username = "root";
 $password = "";

   function article_no($url)
  {

  $servername = "localhost";
   $username = "root";
  $password = "";
  $info=array("kill","rape","murder","extort","stab","Abuse","crime","attack","assault","Blackmail","Bullying","theft","rob","snatch","burglary","case","caution","capture","cheat","damage","danger","threat","drug","Explosive","fraud","gun","bet","gamble","harass","hostage","hijack","accident","injury","kidnap","missing","punishment","torture","terror");


// Create connection
  $conn = mysqli_connect($servername, $username, $password,"indiareads");

// Check connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
     $i=0;
     $j=0;
       $info1=array();
      $html = file_get_dom($url);

      foreach ($html('table.cnt') as $element) {
        $i++;
        if ($i!=2)
          continue;
        if($i==2)
        {
           foreach ($element('a') as $ele) {
            if($j>=3 && $j<10)
            {
            $link=$ele->href;
        $title=$ele->getPlainText();
        foreach($info as $key)
        {
        if (strpos($title, $key) !== false) 
        echo $title;
    //    article_data($link);
      }
      }
      $j++;
           }
        }
      
     
       
       //   article_data($link);
       //  $info1=article_data($link);
      

         // break;
    

      mysqli_close($conn);
    
    }
  }
  function article_data($url)
  {   
      $html = file_get_dom($url);
       
      
      $info=array("kill","rape","murder","extort","stab","Abuse","crime","attack","assault","Blackmail","Bullying","theft","rob","snatch","burglary","case","caution","capture","cheat","damage","danger","threat","drug","Explosive","fraud","gun","bet","gamble","harass","hostage","hijack","accident","injury","kidnap","missing","punishment","torture","terror");
      foreach ($html('meta') as $element)
      {
    
        if($element->name=="news_keywords")
        {
           $keywords= $element->content;
           echo $keywords;
           echo "<br>";
        }
        
      }
    
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


    $url = "http://timesofindia.indiatimes.com/2016/3/11/archivelist/year-2016,month-3,starttime-42440.cms";
    article_no($url);
    

  ?>

  </html>