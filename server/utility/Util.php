<?php

require_once("enum/EmailEnum.php");

class Util
{
	/**
	 * Sets the header()'s "Location" property to the full URL of incoming relative URL.
	 * @static
	 * @param $relURL
	 */
	public static function setHeader($relURL)
	{
		global $controller;

		$fullURL = $controller->configuration->URLs['baseUrl'] . $relURL;

		header("Location: " . $fullURL);

        exit;
	}

	/**
	 * @static
	 * @param $emailType int The type of email to send (See \EmailEnum for more info).
	 * @param $to string The email address to send this email.
	 *
	 * @return bool True if email succeeded, false otherwise
	 */
	public static function sendEmail($emailType, $to, $videoId = -1)
	{
		global $controller, $sport;

		// setup headers
		$headers = "";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: TapePlay Admin <digital-no-reply@tapeplay.com>\r\n";

		// setup subject and message based on incoming email type
		$subject = "";
		switch ($emailType)
		{
			case EmailEnum::$PLAYER_JOIN:
				$subject = "Welcome To TapePlay";
				break;

			case EmailEnum::$PLAYER_JOIN:
				$subject = "Welcome To TapePlay";
				break;

			case EmailEnum::$SHARE:
				$subject = "[Full Name] Has Sent You A Video";
				break;
		}

		$message = file_get_contents($controller->configuration->URLs['baseUrl'] . "email/" . $emailType . "/index.html");

		// replace tokens
		$message = str_replace("{BASE_URL}", $controller->configuration->URLs['baseUrl'], $message);
		$message = str_replace("{EMAIL_TYPE}", $emailType, $message);
		$message = str_replace("{SPORT_NAME}", $sport, $message);
		$message = str_replace("{VIDEO_ID}", $videoId, $message);
		$message = str_replace("{FULL_YEAR}", date('Y'), $message);
		$message = str_replace("{COACH_FEE}", $controller->configuration->information['coachFee'], $message);
		$message = str_replace("{SCOUT_FEE}", $controller->configuration->information['scoutFee'], $message);

		// send email
		return mail($to, $subject, $message, $headers);
	}
}
