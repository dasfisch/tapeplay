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
	}

	/**
	 * @static
	 * @param $emailType int The type of email to send (See \EmailEnum for more info).
	 * @param $to string The email address to send this email.
	 *
	 * @return bool True if email succeeded, false otherwise
	 */
	public static function sendEmail($emailType, $to)
	{
		global $controller;

		// setup headers
		$headers = "";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: TapePlay Admin <admin@tapeplay.com>\r\n";

		// setup subject and message based on incoming email type
		$subject = "";
		switch ($emailType)
		{
			case EmailEnum::$JOIN:
				$subject = "Welcome to TapePlay!";
				break;

			case EmailEnum::$CHECKOUT:
				$subject = "TapePlay - The new Awesomeness";
				break;

			case EmailEnum::$RISING_STAR:
				$subject = "TapePlay Rising Star!";
				break;

			case EmailEnum::$SHARE:
				$subject = "TapePlay - Share the Goodness";
				break;
		}

		$message = file_get_contents($controller->configuration->URLs['baseUrl'] . "email/" . $emailType . "/index.html");

		// send email
		return mail($to, $subject, $message, $headers);
	}
}
