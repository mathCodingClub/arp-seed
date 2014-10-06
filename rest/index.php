<?php

require_once 'vendor/autoload.php';

// init slim app
$app = new \Slim\Slim(array('debug'=>true));

// help service, which describes the api
require_once 'app.php';
new \WS\app($app, '/');

// run slim app
$app->run();

?>
