<?php
ini_set('display_errors', 'On');

    include_once('controllers/main.php');

    try {
        $main = new Controller('general.conf', '/etc/config/tapeplay/');
    } catch(Exception $e) {
        echo '<pre>';
        var_dump($e);
        exit;
    }

echo 'hello';

