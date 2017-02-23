<?php 

function paramsToQuery($params, $geo = 153){

    $geo_id = [
        "geo_id" => 153 // 153 - Брест
    ];

    if(!empty($params) && !array_key_exists('geo_id', $params)){

        $params = http_build_query(array_merge($geo_id, $params));

    } else {

        $params = http_build_query($geo_id);

    }

    return $params;

}

function yaApi(
        $settings, // Передача массива с параметрами
        $format = 'json', // Формат отдачи. (Не работает с xml)
        $token = "rh46struRIZ1n3meDsCEOdztt2I9z5" // Токен для работы с магазином 
    ){ 

    $params = paramsToQuery(array_key_exists('params', $settings) ? $settings['params'] : []);
    
    $type = array_key_exists('type', $settings) ? $settings['type'] : null;

    $query = array_key_exists('query', $settings) ? $settings['query'] : null;

    $id = array_key_exists('id', $settings) ? $settings['id'] : null;

    $client = new \GuzzleHttp\Client(['verify' => false ]);

    if (isset($type, $query, $id, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}/{$id}/{$query}.{$format}?{$params}";

    } else if (isset($type, $id, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}/{$id}.{$format}?{$params}";

    } else if (isset($type, $params)){

        $url = "https://api.content.market.yandex.ru/v1/{$type}.{$format}?{$params}";

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