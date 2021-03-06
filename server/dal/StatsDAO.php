<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Stat.php");

use tapeplay\server\dal\BaseDOA;
use tapeplay\server\model\Stat;
use \Exception;

/**
 * Manages all db access for anything sport-related
 */
class StatsDAO extends BaseDOA
{
    public function getStatsBySport($sportId) {
        try {
//            if(!is_int($sportId) || $sportId <= 0) {
//                Throw new Exception('This is not a valid sport ID!', 666);
//            }

            $this->sql = 'SELECT
                                  stats.id AS stat_id,
                                  stats.stat_name AS stat_name,
                                  stats.sort AS stat_sort,
                                  stats.stat_validation_id AS stat_validation_id,
                                  stats.stat_category_id AS stat_category_id,
                                  validation.id AS validation_id,
                                  validation.name AS validation_name,
                                  validation.regex AS validation_regex
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
	function getStatsByPlayer($playerId, $sportId)
	{
        try
        {
            $stats = null;

            $this->sql = 'SELECT
                                  stats.id AS stat_id,
                                  stats.stat_name AS stat_name,
                                  stats.sort AS stat_sort,
                                  stats.stat_validation_id AS stat_validation_id,
                                  stats.stat_category_id AS stat_category_id,
                                  stat_val.id AS validation_id,
                                  stat_val.name AS validation_name,
                                  stat_val.regex AS validation_regex,
                                  sports.*, ps.value
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
                                ps.player_id=:id
                            AND
                                sports.id=:sport_id';

            $this->prep = $this->dbh->prepare($this->sql);
            $this->prep->bindValue(":id", $playerId, \PDO::PARAM_INT);
            $this->prep->bindValue(":sport_id", $sportId, \PDO::PARAM_INT);
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

    public function updatePlayerStat($stat, $userId) {
        try {
            $this->sql = 'UPDATE
                                `player_stats`
                            SET
                                value=:value
                            WHERE
                                stat_id=:stat_id
                            AND
                                player_id=:player_id';

            $this->prep = $this->dbh->prepare($this->sql);
            $this->prep->bindValue(":value", $stat->getStatValue(), \PDO::PARAM_STR);
            $this->prep->bindValue(":stat_id", (int)$stat->getId(), \PDO::PARAM_INT);
            $this->prep->bindValue(":player_id", (int)$userId, \PDO::PARAM_INT);

            $this->prep->execute();

            return ($this->prep->rowCount() > 0);
        } catch(\PDOException $e) {
            \TPErrorHandling::handlePDOException($exception->errorInfo);
        }
    }
}