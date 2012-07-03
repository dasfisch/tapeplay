<?php

class DateUtil
{
	public static function generateTimestamp()
	{
		// needs to be in format of YYYY-MM-DDTHH:MM:SS+00:00
		return date("Y-m-d\Th:i:sP");
	}

	public static function convertDateToTimestamp($date)
	{
		return strtotime($date);
	}
}
