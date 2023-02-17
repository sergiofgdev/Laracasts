<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();


// The bind function will have
// Path -> identification or key for this binding
// Function -> responsible for building up the database object
$container->bind('Core\Database', function () {
    // this builds the database
    $config = require base_path('config.php');//config equal to whatever is return in config.php
    return new Database($config['database']); //creating an instance of the database class
});

App::setContainer($container);
