<?php

require_once("bll/Panda.php");

use tapeplay\server\bll\Panda;

// The details of your Panda account
$panda = new Panda(array(
	'api_host' => 'api.pandastream.com', // Use api.eu.pandastream.com if your account is in the EU
	'cloud_id' => 'd4a9dbbf62283685c237bc487936a06c',
	'access_key' => 'AKIAJ7AKJ6KNW6T63MXA',
	'secret_key' => 'izNrJ/Bd/rHUdBAnwJTtXf0B/37XMkOaEczyJRCt'
));

// The S3 bucket where your Panda cloud has been told to store encoded videos
$s3_bucket_name = 'tapeplay';

$video_id = $_GET["panda_video_id"];
$panda_encodings = json_decode(@$panda->get("/videos/{$video_id}/encodings.json"));

$mp4 = false;

foreach ($panda_encodings as $panda_encoding)
{
	if ($panda_encoding->extname == '.mp4' && $panda_encoding->status == 'success')
	{
		$mp4 = new StdClass();
		$mp4->id = $panda_encoding->id;
		$mp4->url = "http://$s3_bucket_name.s3.amazonaws.com/{$panda_encoding->id}{$panda_encoding->extname}";
		$mp4->width = $panda_encoding->width;
		$mp4->height = $panda_encoding->height;
		$mp4->screenshot_url = "http://$s3_bucket_name.s3.amazonaws.com/{$panda_encoding->id}_4.jpg";
	}
}
?>
<?php if ($mp4) : ?>
<h1>Your video, encoded with Panda</h1>

<div>
	<h2>Using HTML5</h2>
	<video id="movie" width="<?php echo $mp4->width ?>" height="<?php echo $mp4->height ?>" preload="none"
		   poster="<?php echo $mp4->screenshot_url ?>" controls>
		<source src="<?php echo $mp4->url ?>" type="video/mp4">
	</video>
</div>
<p style="clear: both; padding-top: 1em;"><a href="<?php echo BASE_URL ?>/index.php">Try with a different video</a></p>
<?php else : ?>
<p>Your video has not been encoded yet. Please wait a few moments and <a href="<?php echo $_SERVER['REQUEST_URI'] ?>">refresh
	this page</a>.</p>
<?php endif ?>
<h2>Encoding details</h2>
<pre><?php print_r($panda_encodings) ?></pre>
<?php include('lib/foot.inc.php'); ?>