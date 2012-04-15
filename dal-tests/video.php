<?php

require_once ("bll/VideoBLL.php");

use tapeplay\server\bll\VideoBLL;
use tapeplay\server\model\Video;

$bll = new VideoBLL();

$video = new Video();

print "Inserting new video...<br/>";

$video->setId(-1);
$video->setUrlCode("url_code");
$video->setBaseFileName("videos/my_video.mp4");
$video->setTitle("Greatest Video Ever");
$video->setLength(165);
$video->setRecorded(1225540800);
$video->setUploaded(1225539500);
$video->setViews(3);
$video->setThumbnailFileName("greatest-ever.jpg");
$video->setActive(true);

$id = $bll->insert($video);

echo "Video was inserted.  ID is " . $id;