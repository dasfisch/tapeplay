<?php

/**
 * Represents a class that handles different exceptions that are thrown.
 */
class TPErrorHandling
{
	public static function handlePDOException($errorArr)
	{
		// TODO: Log exception at some point?

		print_r($errorArr);
	}
}
