<?php

require_once ("bll/VideoBLL.php");

use tapeplay\server\bll\VideoBLL;
use tapeplay\server\model\Video;

$bll = new VideoBLL();

$video = new Video();

print "Inserting new video...<br/>";

$video->setId(-1);
$video->setTitle("Greatest Video Ever");
$video->setPandaId("LKJFDSLKDJHWE234DSF23ADFAS");
$video->setRecordedMonth(1);
$video->setRecordedYear(2008);
$video->setUploadDate(time());
$video->setActive(true);

$id = $bll->insert($video);

echo "Video was inserted.  ID is " . $video->getId();