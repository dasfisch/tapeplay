<?php

require_once("bll/Panda.php");

use tapeplay\server\bll\Panda;

$panda = new Panda();

$video = $panda->post('/videos.json', array(
    'source_url' => 'http://s3.amazonaws.com/tpvideosdev/1518521b3e449dc5ad7aa6f1d083d922.mp4'
));
echo "<p>Video details as received from Panda:</p>\n";
echo "<pre>\n" . print_r($video, true) . "\n</pre>\n";

?>