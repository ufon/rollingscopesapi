<?php 

function yaApi($type, $id, $query, $format = 'json', $token = "rh46struRIZ1n3meDsCEOdztt2I9z5" , $params = "?geo_id=153"){
    
    $client = new \GuzzleHttp\Client(['verify' => false ]);

    if (isset($type, $query, $id, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}/{$id}/{$query}.{$format}{$params}";

    } else if (isset($type, $id, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}/{$id}.{$format}{$params}";

    } else if (isset($type, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}.{$format}{$params}";

    } else {

        exit('Invalid parametrs. yaApi handler.');

    }

    //echo $url;

    $res = $client->request('GET', $url, [
        'headers' => [
            'Host' => 'api.content.market.yandex.ru',
            'Accept'     => '*/*',
            'Authorization'      => $token
        ]
    ]);

    //exit ($response);
    
    return json_decode($res->getBody());

}

?>