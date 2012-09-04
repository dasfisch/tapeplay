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
		$host = DB_HOST;
		$dbname = DB_NAME;
		$username = DB_USER;
		$password = DB_PASS;

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

    /**
     * @TODO: Go through next three methods, and ensure the set up of the queries runs
     * through $this->prep->bindParam();
     */
    protected function _setWhere($filter) {
        if(empty($filter)) {
            return;
        }

        $alias = null;
        $where = null;
        $wheres = null;

        foreach($filter as $key=>$single) {
            if($key !== 'method') {
                if(is_array($single)) {
                    foreach($single as $singKey=>$sing) {
                        $wheres[$key][] = is_int($sing) ? (int)$sing : '"'.$sing.'"';
                    }
                } else {
                    $wheres[$key] = is_int($single) ? (int)$single : '"'.$single.'"';
                }
            } else {
                $alias = $single.'.';
            }
        }

        $count = count($wheres);
        if($count > 0) {
            $i = 0;
            $where = ' WHERE ';

            foreach($wheres as $key=>$single) {
                if(is_array($single)) {

                    $where .= $alias.$key.' IN ('.implode(', ', $single).')';
                } else {
                    $where .= ($i < ($count - 1)) ? $alias.$key.'='.$single.' AND ' : $alias.$key.'='.$single;
                }

                $i++;
            }
        }

        return $where;
    }

    protected function _setLike($filter) {
        if(empty($filter)) {
            return;
        }

        $alias = null;
        $like = null;
        $likes = null;

        foreach($filter as $key=>$single) {
            if($key !== 'method') {
                $likes[$key] = $single;
            } else {
                $alias = $single.'.';
            }
        }

        $count = count($likes);
        if($count > 0) {
            $i = 0;
            $like = '';

            foreach($likes as $key=>$single) {
                $like .= ($i < ($count - 1)) ? $alias.$key.' LIKE "%'.$single.'%" AND ' : $alias.$key.' LIKE "%'.$single.'%"';

                $i++;
            }
        }

        return $like;
    }

    protected function _setSort($filter) {
        if(empty($filter)) {
            return;
        }

        $alias = isset($filter['method']) && !empty($filter['method']) ? $filter['method'].'.' : '';
        $name = isset($filter['name']) && !empty($filter['name']) ? $filter['name'] : '';
        $order = isset($filter['order']) && !empty($filter['order']) ? ' '.$filter['order'] : '';

        $sort = 'ORDER BY '.$alias.$name.$order;

        return $sort;
    }
}
