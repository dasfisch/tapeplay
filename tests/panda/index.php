<?php

include('lib/Panda.php');
include('lib/config.inc.php');
include('lib/head.inc.php');

$videos = json_decode($panda->get('/videos.json')); 
foreach($videos as $video)
{
	$panda_encodings = json_decode(@$panda->get("/videos/{$video->id}/encodings.json"));
	$encoding = $panda_encodings[0];
	
?>
	<div class="vid_container">
		<video id="movie" width="<?php echo $video->width ?>" height="<?php echo $video->height ?>" preload="none" controls>
<?php	
	foreach ($panda_encodings as $encoding)
	{
?>
      <source src="http://s3.amazonaws.com/<?=$s3_bucket_name?>/<?=$encoding->id?><?=$encoding->extname?>" type="<?=getVType($encoding->extname)?>">
<?php
	}
?>
		</video>
	</div>
<?php 
}
 ?>
<?php 

function getVType($x)
{
	switch($x)
	{
		case ".mp4":
			return "video/mp4";
			break;
		case ".ogv":
			return "video/ogg";
			break;
		case ".webm":
			return "video/webm";
			break;
	}
}

include('lib/foot.inc.php'); ?>