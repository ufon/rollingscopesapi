<?php 

function yaApi($type, $id, $query, $format = 'json', $token = "rh46struRIZ1n3meDsCEOdztt2I9z5" , $params = "?geo_id=153"){
    
     
    if (isset($type, $query, $id, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}/{$id}/{$query}.{$format}{$params}";

    } else if (isset($type, $id, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}/{$id}.{$format}{$params}";

    } else if (isset($type, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}.{$format}{$params}";

    } else {

        exit('Invalid parametrs. yaApi handler.');

    }

    echo $url;

    $headers = array(
    "Host: api.content.market.yandex.ru",
    "Accept: */*",
    "Authorization: {$token}"
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url); 

    //return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    //set header with token 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // close curl resource to free up system resources 
    $response = curl_exec($ch);

    curl_close($ch);  

    //exit ($response);
    
    return $response;

}

?>