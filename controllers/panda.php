<?php
require_once("enum/PandaNotificationTypes.php");
require_once("enum/EmailEnum.php");
require_once("utility/Util.php");
require_once("bll/VideoBLL.php");

use tapeplay\server\bll\VideoBLL;

global $controller, $inputFilter, $route, $smarty, $userBLL;

if (isset($route->method))
{
	switch ($route->method)
	{
		case "notifications": // http://www.tapeplay.com/panda/notifications

			// check the post variable for the event
			$event = $_POST["event"];
			$videoId = $_POST["video_Id"];

			switch ($event)
			{
				case PandaNotificationTypes::$VIDEO_CREATED:
					// may or may not need to be implemented.
					break;

				case PandaNotificationTypes::$VIDEO_ENCODED:
					// all encodings are complete.  send user an email

					// first get user associated with video so we can get email
					$videoBLL = new VideoBLL();
					$email = $videoBLL->getUserEmailByPandaId($videoId);

					$args = array(
						"videoId" => $videoId,
					);
					// send out the email!
					Util::sendEmail(EmailEnum::$VIDEO_PUBLISH, $email, "Your Video Is Published", $args);
					break;

				case PandaNotificationTypes::$ENCODING_PROGRESS:
					$progress = $_POST["progress"];
					break;

				case PandaNotificationTypes::$ENCODING_COMPLETE:
					break;
			}

			break;
	}
}
else
{
	/**
	 * If method isn't set, do a default action;
	 * I think that the best will be a basic view all.
	 */
}
