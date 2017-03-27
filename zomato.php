<?php


$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://developers.zomato.com/api/v2.1/search?entity_id=1&entity_type=city',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER=>array('Accept: application/json','user-key: f2bb1812f6672e7038ed1610cd45eec8')

        ));
        $json = curl_exec($curl);
        curl_close($curl);
        echo $json;
?>
