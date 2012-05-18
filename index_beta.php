<?php
    ini_set('display_errors', 'On');

    include_once('general/controller.php');
    include_once('general/configuration.php');
    include_once('general/factory.php');
    include_once('general/request.php');
    include_once('general/route.php');

    try {

    } catch(Exception $e) {
        echo '<pre>';
        var_dump($e);
        exit;
    }