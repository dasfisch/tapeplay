<?php

require_once ("bll/VideoBLL.php");

use tapeplay\server\bll\VideoBLL;
use tapeplay\server\model\Video;

$bll = new VideoBLL();

$video = new Video();

if (true)
{
	print "Inserting new video...<br/>";

	$video->setId(-1);
	$video->setTitle("Sample iTunes Video");
	$video->setPandaId("6e60c43cac49d8e387c650283c270595"); // iTunes Sample Video
	$video->setRecordedMonth(1);
	$video->setRecordedYear(2008);
	$video->setUploadDate(time());
	$video->setActive(true);

	$newVideo = new Video();
	$newVideo = $bll->insertVideo($video);

	echo "Video was inserted.  ID is " . $newVideo->getId();
}

if (true)
{
	print "Grabbing video " . $newVideo->getId() . "...<br/>";

	print_r ($bll->get($newVideo->getId()));
}

if (true)
{
	print "Showing video for " . $video->getPandaId() . "...<br/>";

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>TapePlay</title>

	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script type="text/javascript" src="/js/tapeplay.js"></script>
	<script type="text/javascript" src="/js/jwplayer.js"></script>
</head>
<body>
<?php
	print $bll->getFullVideoHTML($newVideo->getPandaId());
?>

</body>
</html>

<?php } ?>