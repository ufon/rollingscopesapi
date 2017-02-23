<?php
require 'yandex/api.php';

$app->get('/categories', function($request, $response, $args) {

    $data = yaApi([
        'type' => 'category'
        ]);

    return $response
        ->withHeader('Content-type', 'application/json')
        ->withJson($data);

});

$app->get('/category/{id}/[{query}]', function($request, $response, $args) {

    $id = array_key_exists('id', $args) ? (int)$args['id'] : null;

    $query = array_key_exists('query', $args) ? $args['query'] : null;

    $params = $request->getQueryParams() ?: [];

    switch ($query) {
        case 'filters':
            $data = yaApi(['type' => 'category', 'id' => $id, 'query' => 'filters', 'params' => $params]);
            break;
        case 'models':
            $data = yaApi(['type' => 'category', 'id' => $id, 'query' => 'models', 'params' => $params]);
            break;
        case 'children':
            $data = yaApi(['type' => 'category', 'id' => $id, 'query' => 'children', 'params' => $params]);
            break;
        default:
            $data = yaApi(['type' => 'category', 'id' => $id, 'params' => $params]);
            break;
    }

    return $response
        ->withHeader('Content-type', 'application/json')
        ->withJson($data);

});

?>