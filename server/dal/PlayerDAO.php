<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");

use tapeplay\server\model\Player;
use tapeplay\server\model\SearchFilter;

require_once "model/Player.php";
/**
 * Contains all database access for managing a player.
 */
class PlayerDAO extends BaseDOA
{
	public function get($id)
	{
		try
		{
			$this->sql = "SELECT
                                users.*,
                                players.*,
                                schools.*,
                                sports.*,
                                positions.*
                            FROM
                                users users
                            JOIN
                                players players
                                    ON
                                        players.user_id=users.id
                            JOIN
                                schools schools
                                    ON
                                        schools.id=players.school_id
                            JOIN
                                sports sports
                                    ON
                                        sports.id=players.sport_id
                            WHERE
                                users.id=:id";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return Player::create($this->prep->fetch());
	}

	/**
	 * Inserts player to get player id.  Only links user id.
	 * @param $userId int
	 * @return int The ID of the user that as created.
	 */
    public function insert($userId)
   	{
   		$this->sql = "INSERT INTO players
   						(user_id)
   						VALUES
   						(:userId);";

   		$this->prep = $this->dbh->prepare($this->sql);
   		$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);

   		$this->prep->execute();

   		// return the player with his id
   		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
   	}

    public function insertPlayerStat($playerId, $statId, $statValue)
   	{
   		$this->sql = "INSERT INTO
                        player_stats
   						(
   						    player_id,
   						    stat_id,
   						    value
                        )
   						VALUES
   						(
   						    :playerId,
   						    :statId,
   						    :value
                        );";

   		$this->prep = $this->dbh->prepare($this->sql);
        $this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
        $this->prep->bindValue(":statId", $statId, \PDO::PARAM_INT);
        $this->prep->bindValue(":value", $statValue, \PDO::PARAM_INT);

   		$this->prep->execute();

   		// return the player with his id
   		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
   	}

    public function insertPlayerPosition($playerId, $positionId) {
        $this->sql = "INSERT INTO
                            player_positions
      						(
      						    player_id,
      						    position_id
                            )
      						VALUES
      						(
                                :playerId,
      						    :positionId
                            );";

        $this->prep = $this->dbh->prepare($this->sql);
        $this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
        $this->prep->bindValue(":positionId", $positionId, \PDO::PARAM_INT);

        $this->prep->execute();

        // return the player with his id
        return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
    }

    public function deletePlayerPosition($playerId, $positionId) {
        $this->sql = "DELETE FROM player_positions WHERE player_id=:playerId AND position_id=:positionId";

        $this->prep = $this->dbh->prepare($this->sql);
        $this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
        $this->prep->bindValue(":positionId", $positionId, \PDO::PARAM_INT);

        return $this->prep->execute();
    }

	function update(Player $player)
	{
		$this->sql = "UPDATE players SET
						number = :number,
						height = :height,
						grade_level = :gradeLevel,
						playing_level = :playingLevel,
						video_access = :videoAccess,
						weight = :weight,
						coach_name = :coachName,
						graduation_month = :graduationMonth,
						graduation_year = :graduationYear,
						user_id = :userId,
						school_id = :schoolId,
						sport_id = :sportId
						WHERE id = :id";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":id", $player->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":gradeLevel", $player->getGradeLevel(), \PDO::PARAM_STR);
		$this->prep->bindValue(":playingLevel", $player->getPlayingLevel(), \PDO::PARAM_INT);
		$this->prep->bindValue(":videoAccess", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":weight", $player->getWeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":coachName", $player->getCoachName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":graduationMonth", $player->getGraduationMonth(), \PDO::PARAM_INT);
		$this->prep->bindValue(":graduationYear", $player->getGraduationYear(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $player->getUserId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":schoolId", $player->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":sportId", $player->getSport()->getId(), \PDO::PARAM_INT);

		return $this->prep->execute();

//		return ($this->prep->rowCount() > 0);
	}

    /**
   	 * @param SearchFilter $filter
   	 * @return array An array of players who match the search query.
   	 */
   	function getPlayers(SearchFilter $filter)
   	{
   		try
   		{
   			$this->sql = "SELECT * FROM players p INNER JOIN users u ON p.user_id = u.id LEFT JOIN schools s ON p.school_id = s.id";
   			$this->prep = $this->dbh->prepare($this->sql);
   			//$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
   			$this->prep->execute();
   		}
   		catch (\PDOException $exception)
   		{
   			\TPErrorHandling::handlePDOException($exception->errorInfo);
   			return null;
   		}

   		$playerList = array();
   		while ($row = $this->prep->fetch())
   		{
   			array_push($playerList, Player::create($row));
   		}

   		return $playerList;
   	}

    /**
   	 * @param SearchFilter $filter
   	 * @return array An array of players who match the search query.
   	 */
   	function getPlayersByUserId($userId, $noGroup=true)
   	{
   		try
   		{
   			$this->sql = "SELECT u.*,
                                p.id as player_id,
                                p.number as number,
                                p.height as height,
                                p.grade_level as grade_level,
                                p.video_access as video_access,
                                p.playing_level as playing_level,
                                p.weight as weight,
                                p.coach_name as coach_name,
                                p.graduation_month as graduation_month,
                                p.graduation_year as graduation_year,
                                p.user_id as user_id,
                                p.school_id as school_id,
                                p.sport_id as sport_id,
                                s.id as schoolId,
                                s.name as schoolName,
                                s.city as schoolCity,
                                s.state as schoolState,
                                s.division as schoolDivision, sp.id as sport_id, sp.name as sport_name FROM
   			                players p
   			                INNER JOIN users u ON p.user_id = u.id
   			                LEFT JOIN schools s ON p.school_id = s.id
   			                LEFT JOIN player_positions ppos ON ppos.player_id=p.id
   			                LEFT JOIN positions pos ON pos.id=ppos.position_id
   			                JOIN sports sp ON sp.id = p.sport_id
   			                WHERE p.user_id=:userId";

            if($noGroup === false) {
                $this->sql .= " GROUP BY sp.id";
            }

   			$this->prep = $this->dbh->prepare($this->sql);
   			$this->prep->bindValue(":userId", (int)$userId, \PDO::PARAM_INT);
   			$this->prep->execute();
   		}
   		catch (\PDOException $exception)
   		{
   			\TPErrorHandling::handlePDOException($exception->errorInfo);
   			return null;
   		}

   		$playerList = array();
   		while ($row = $this->prep->fetch())
   		{
   			array_push($playerList, Player::create($row));
   		}

   		return $playerList;
   	}

    /**
   	 * @param SearchFilter $filter
   	 * @return array An array of players who match the search query.
   	 */
   	function getPlayersByPlayerId($userId, $sportId=null)
   	{
   		try
   		{
            $extra = '';
            if(isset($sportId) && !empty($sportId) && $sportId != '') {
                $extra = ' AND p.sport_id=:id';
            }

   			$this->sql = "SELECT u.*,
                                p.id as player_id,
                                p.number as number,
                                p.height as height,
                                p.grade_level as grade_level,
                                p.video_access as video_access,
                                p.playing_level as playing_level,
                                p.weight as weight,
                                p.coach_name as coach_name,
                                p.graduation_month as graduation_month,
                                p.graduation_year as graduation_year,
                                p.user_id as user_id,
                                p.school_id as school_id,
                                p.sport_id as sport_id,
                                s.id as schoolId,
                                s.name as schoolName,
                                s.city as schoolCity,
                                s.state as schoolState,
                                s.division as schoolDivision, sp.id as sport_id, sp.name as sport_name FROM
   			                players p
   			                INNER JOIN users u ON p.user_id = u.id
   			                LEFT JOIN schools s ON p.school_id = s.id
   			                LEFT JOIN player_positions ppos ON ppos.player_id=p.id
   			                LEFT JOIN positions pos ON pos.id=ppos.position_id
   			                JOIN sports sp ON sp.id = p.sport_id
   			                WHERE p.id=:userId".$extra."";

   			$this->prep = $this->dbh->prepare($this->sql);

   			$this->prep->bindValue(":userId", (int)$userId, \PDO::PARAM_INT);

            if(isset($sportId) && !empty($sportId) && $sportId != '') {
               $this->prep->bindValue(":userId", (int)$userId, \PDO::PARAM_INT);
            }

   			$this->prep->execute();
   		}
   		catch (\PDOException $exception)
   		{
   			\TPErrorHandling::handlePDOException($exception->errorInfo);
   			return null;
   		}

        return Player::create($this->prep->fetch());
   	}

    public function searchPlayers(SearchFilter $searchFilter) {
        try
        {
           $limit = $filter->limit;
           $page = $filter->page;

           $startLimit = ($page * $limit) - $limit;

           $where = !is_null($filter->getWhere()) ? $this->_setWhere($filter->getWhere()) : null;
           $like = !is_null($filter->getLike()) ? $this->_setLike($filter->getLike()) : null;
           $groupBy = '';
           $sort = !is_null($filter->getSort()) ? $this->_setSort($filter->getSort()) : null;

           if((isset($where) && $where != '') && isset($like) && $like != '') {
              $where.= ' AND ';
           }
            
           $this->sql = 'SELECT
                               users.*,
                               p.id AS player_id, p.number, p.height, p.grade_level, p.playing_level, p.video_access,
                               p.position, p.weight, p.coach_name, p.graduation_month, p.graduation_year,
                               s.id AS schoolId, s.name as schoolName, s.city as schoolCity,
                               s.state as schoolState, s.division AS schoolDivision,
                               sp.id AS sport_id,
                               sp.name AS sport_name
                           FROM
                               users users
                           INNER JOIN
                               players p
                                   ON
                                       p.user_id=users.id
                           LEFT JOIN
                               schools s
                                   ON
                                       p.school_id=s.id
                           LEFT JOIN
                               sports sp
                                   ON
                                       sp.id = p.sport_id
                           '.$where.'
                           '.$like.'
                           '.$groupBy.'
                           '.$sort.'
                           LIMIT '.$startLimit.','.$limit;

           $this->prep = $this->dbh->prepare($this->sql);
           //$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
           $this->prep->execute();
       }
       catch (\PDOException $exception)
       {
           \TPErrorHandling::handlePDOException($exception->errorInfo);
           return null;
       }

       $userList = array();
       while ($row = $this->prep->fetch())
       {
           array_push($userList, User::create($row));
       }

       return $userList;
    }

    public function setMyVideoPrivacy($playerId, $privacy) {
        $this->sql = 'UPDATE videos SET is_private=:privacy WHERE player_id=:playerId';

        $this->prep = $this->dbh->prepare($this->sql);
        $this->prep->bindValue(":privacy", $privacy, \PDO::PARAM_INT);
        $this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);

        return $this->prep->execute();
    }
}