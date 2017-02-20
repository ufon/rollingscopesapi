<?php

$app->get('/filter/{id}', function($request, $response, $args) {

    $id = (int)$args['id'];

    $data = [$id];

    return $response
        ->withHeader('Content-type', 'application/json')
        ->withJson($data);

});

?>