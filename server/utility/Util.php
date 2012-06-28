<?php

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

		header("Location: " .$fullURL);
	}
}
