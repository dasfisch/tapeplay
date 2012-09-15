<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Position.php");

use tapeplay\server\model\Position;
use tapeplay\server\model\SearchFilter;

/**
 * Manages all db access for anything sport-related
 */
class PositionDAO extends BaseDOA
{
    function getPositionsByPlayer($playerId)
   	{
   		try
   		{
   			$this->sql = "SELECT pos.id, pos.name
   							FROM positions pos
   							INNER JOIN player_positions pp ON pos.id = pp.position_id
   							INNER JOIN players ply ON ply.id = pp.player_id
   							WHERE ply.id = :playerId";

   			$this->prep = $this->dbh->prepare($this->sql);
   			$this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
   			$this->prep->execute();
   		}
   		catch (\PDOException $exception)
   		{
   			\TPErrorHandling::handlePDOException($exception->errorInfo);
   			return null;
   		}

   		$positionList = array();
   		while ($row = $this->prep->fetch())
   		{
   			array_push($positionList, Position::create($row));
   		}

   		return $positionList;
   	}

    function getPositionsBySport($sportId)
   	{
   		try
   		{
   			$this->sql = "SELECT pos.id, pos.name
                            FROM positions pos
                            WHERE sport_id = :sportId";

   			$this->prep = $this->dbh->prepare($this->sql);
   			$this->prep->bindValue(":sportId", (int)$sportId, \PDO::PARAM_INT);
   			$this->prep->execute();
   		}
   		catch (\PDOException $exception)
   		{
   			\TPErrorHandling::handlePDOException($exception->errorInfo);
   			return null;
   		}

   		$positionList = array();
   		while ($row = $this->prep->fetch())
   		{
   			array_push($positionList, Position::create($row));
   		}

   		return $positionList;
   	}
}