<?php

require_once("bll/VideoBLL.php");
require_once("bll/Panda.php");

use tapeplay\server\bll\VideoBLL;
use tapeplay\server\bll\Panda;

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

	// grab the video id from the URL
	$video_id = $_GET["id"];

	// get HTML for incoming video id
	$playerBLL = new VideoBLL();
	print $playerBLL->getVideoDisplayInfo($video_id);

?>

</body>
</html>


