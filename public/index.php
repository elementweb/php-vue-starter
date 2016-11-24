<?php

/**
 * Class autoloader
 */

require __DIR__ . '/../vendor/autoload.php';

/**
 * Config
 */

$config = require __DIR__ . '/../config/app.php';

date_default_timezone_set('UTC');

/**
 * Initialize models and database connection
 */

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection(require __DIR__ . '/../config/database.php');
$capsule->setAsGlobal();
$capsule->bootEloquent();

/**
 * Initialize router
 */

$router = new \AltoRouter();

$router->setBasePath("");

// load route maps
require __DIR__ . '/../config/routes.php';

$match = $router->match();

if ($match === false) {
    echo App\Helpers\View::error('404');
} else {
    list( $controller, $action ) = explode( '#', $match['target'] );
    if ( is_callable(array($controller, $action)) ) {
        $obj = new $controller();
        echo call_user_func_array(array($obj, $action), array($match['params']));
    } else {
        echo App\Helpers\View::error('404');
    }
}