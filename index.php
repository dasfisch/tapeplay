<?php
    ini_set('display_errors', 'On');
    
    include('constants.php');

    include_once('general/controller.php');
    include_once('general/configuration.php');
//    include_once('general/factory.php');
    include_once('general/request.php');
    include_once('general/route.php');
    include_once('general/tapeplay.smarty.php');

    $controller = new Controller();
    $route = new Route();

    $isLoggedIn = true;

    try {
        if($isLoggedIn) {
            /**
             * ALL MENTIONS OF __CLASS__ MEAN THE CONTROLLER FILE
             *
             * Open the controller if the __CLASS__ parameter is set in the $_GET;
             * Otherwise, open up the index template
             */
            if(isset($route->class)) {
                //open the class file
                $controller->open('videos');
            } else {
                //open the home page
            }
        }
    } catch(Exception $e) {
        echo '<pre>';
        var_dump($e);
        exit;
    }