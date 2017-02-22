<?php
require 'yandex/api.php';

$app->get('/categories', function() {

    $data = yaApi('category');

    return $response
        ->withHeader('Content-type', 'application/json')
        ->withJson($data);

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