<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Stat.php");

use tapeplay\server\dal\BaseDOA;
use tapeplay\server\model\Stat;

/**
 * Manages all db access for anything sport-related
 */
class StatsDAO extends BaseDOA
{
    public function getStatsBySport($sportId) {
        try {
            if(!is_int($sportId) || $sportId <= 0) {
                Throw new Exception('This is not a valid sport ID!', 666);
            }

            $this->sql = 'SELECT
                                  stats.*, validation.*
                              FROM
                                  stats stats
                              LEFT JOIN
                                  stat_validations validation
                                      ON
                                          validation.id=stats.stat_validation_id
                              WHERE
                                  stats.sport_id=:id';

            $this->prep = $this->dbh->prepare($this->sql);
            $this->prep->bindValue(":id", $sportId, \PDO::PARAM_INT);
            $this->prep->execute();

            while($value = $this->prep->fetch()) {
                $stats[] = Stat::create($value);
            }

            return $stats;
        } catch(\PDOException $e) {
            \TPErrorHandling::handlePDOException($e->errorInfo);
            return null;
        }
    }

	/**
	 * Fetches the sport details
	 * @param $id The id of the sport
	 */
	function getStatsByPlayer($playerId)
	{
        try
        {
            $stats = null;

            $this->sql = 'SELECT
                                stats.*, sports.*, stat_val.*, ps.value
                            FROM
                                stats stats
                            LEFT JOIN
                                player_stats ps
                                    ON
                                        ps.stat_id=stats.id
                            JOIN
                                sports sports
                                    ON
                                        sports.id=stats.sport_id
                            JOIN
                                stat_validations stat_val
                                    ON
                                        stat_val.id=stats.stat_validation_id
                            WHERE
                                ps.player_id=:id';

            $this->prep = $this->dbh->prepare($this->sql);
            $this->prep->bindValue(":id", $playerId, \PDO::PARAM_INT);
            $this->prep->execute();

            while($value = $this->prep->fetch()) {
                $stats[] = Stat::create($value);
            }

            return $stats;
        }
        catch (\PDOException $exception)
        {
            \TPErrorHandling::handlePDOException($exception->errorInfo);
            return null;
        }
	}
}