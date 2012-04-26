<?php

require_once("bll/Panda.php");

use tapeplay\server\bll\Panda;

// The details of your Panda account
$panda = new Panda();


$video_id = $_GET['panda_video_id']; // Coming from the previous form

$all_encodings = json_decode(@$panda->get("/videos/$video_id/encodings.json"));
$vid = $all_encodings[0];
$vid->url = "http://tapeplay.s3.amazonaws.com/{$vid->path}{$vid->extname}";
?>

<div>
    <video id="movie" width="<?php echo $vid->width ?>" height="<?php echo $vid->height ?>" preload="none" controls>
      <source src="<?php echo $vid->url ?>" type="video/mp4">
    </video>
</div>