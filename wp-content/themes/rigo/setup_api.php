<?php

/**
 * To create new API calls, you have to instanciate the API controller and start adding endpoints
*/
$api = new \WPAS\Controller\WPASAPIController([ 
    'version' => '1', 
    'application_name' => 'sample_api', 
    'namespace' => 'Rigo\\Controller\\' 
]);


/**
 * Then you can start adding each endpoint one by one
*/
$api->get([ 'path' => '/products', 'controller' => 'SampleController:getAllProducts' ]); 
$api->post([ 'path' => '/products', 'controller' => 'SampleController:createProduct' ]); 

