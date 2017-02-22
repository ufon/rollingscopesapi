<?php
require 'yandex/api.php';

$app->get('/categories', function() {

    $client = new \GuzzleHttp\Client(['verify' => false ]);

    $res = $client->request('GET', 'https://api.content.market.yandex.ru/v1/category.json', [
        'headers' => [
            'Host' => 'api.content.market.yandex.ru',
            'Accept'     => '*/*',
            'Authorization'      => 'rh46struRIZ1n3meDsCEOdztt2I9z5'
        ]
    ]);

    echo $res->getBody();

});

$app->get('/category/{id}/[{type}]', function($request, $response, $args) {

    $id = (int)$args['id'];

    $type = $args['type'];

    switch ($type) {
        case 'filters':
            $data = [$id, 'filters'];
            break;
        case 'models':
            $data = [$id, 'models'];
            break;
        case 'children':
            $data = [$id, 'children'];
            break;
        default:
            $data = [$id, 'info'];
            break;
    }

    return $response
        ->withHeader('Content-type', 'application/json')
        ->withJson($data);

});

?>