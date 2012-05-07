<?php

namespace tapeplay\server\dal;

require_once "TPErrorHandling.php";
require_once "TPDB.php";

/**
 * Represents the base class that all data access objects
 * use.  This will have a PDO object readily available
 */
class BaseDOA
{
	protected $dbh;

	protected $sql;
	protected $prep;

	public function __construct()
	{
		// TODO: Pull these from configuration file
		$host = "localhost";
		$dbname = "dev_tapeplay";
		$username = "tp_user_12";
		$password = "tapeplay!";

		try
		{
			// grab datbase reference for use in this request
			$this->dbh = new TPDB($host, $dbname, $username, $password);
		}
		catch (\PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	/**
	 * Returns the ID of the last item inserted into the database.
	 * @return string The last inserted ID from the database.
	 */
	public function getLastInsertID()
	{
		return $this->dbh->lastInsertId(null);
	}

	/**
	 * Closes the database handler object.
	 */
	public function closePDO()
	{
		$this->dbh = null;
	}

}
