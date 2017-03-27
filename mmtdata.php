

<?php

  include('ganon.php');
 
   function article_no($url)
  {

 
 
      $html = file_get_dom('https://www.makemytrip.com/travel-guide/jaipur/things-to-do.html');
      echo $html->getInnerText();
      foreach ($html('div') as $element) {
          echo "ddsd";
      }
      foreach ($html('li') as $element) {
        echo "dd";
       echo $element->getInnerText();
        foreach ($element('img') as $key ) {
          echo $key->src."\\";
        }
        foreach ($element('a.titleClass') as $key ) {
          echo $key->title."\\";
        }
        foreach ($element('p') as $key ) {
          echo $key->getInnerText();
        }
       
       //   article_data($link);
       //  $info1=article_data($link);
      

         // break;
    


    
    }
  }
  
    $url = "https://www.makemytrip.com/travel-guide/jaipur/things-to-do.html";
    article_no($url);
    

  ?>

