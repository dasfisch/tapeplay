<?php
	class IndexController extends \Phalcon\Mvc\Controller {
	    public function indexAction() {
		    $users = new Users();

		    echo '<pre>';

		    /**
		     * findFirst() returns you the object typeof __CLASSNAME__ if there is
		     * a match found.
		     */
		    foreach($users->findFirst(57)->getPlayers() as $player) {
			    /**
			     * get__CLASSNAME__() (__CLASSNAME__ REFERS TO Players) returns false if there is no relation found;
			     * otherwise it returns an objet typeof __CLASSNAME__.
			     *
			     * This is a pivot table relationship, so it will require we get all
			     * objects typeof __PIVOTCLASSNAME__ (PlayerStats). Then, we will have to get all
			     * of the typeof __SECONDCLASSNAME__ (Stats). If pivot objects exist,
			     * __SECONDCLASSNAME__ exist.
			     */
			    if($player->getPlayerStats()->getFirst() !== FALSE) {
				    foreach($player->getPlayerStats() as $stats) {
				        foreach($stats->getStats() as $stat) {
					        echo 'Stat name: ';
					        var_dump($stat->stat_name);
				        }
				    }
			    }

			    /**
			     * See above for explanation
			     */
			    if($player->getPlayerPositions() !== FALSE) {
				    foreach($player->getPlayerPositions() as $positions) {
					    foreach($positions->getPositions() as $position) {
						    echo 'Position name: ';
						    var_dump($position->name);
					    }
				    }
			    }

			    /**
			     * Regular hasMany() relationship.
			     *
			     * This is how we get many results of __SECONDCLASSNAME__ (__SECONDCLASSNAME__ refers to Videos).
			     * As long as get__SECONDCLASSNAME__() does not return false, we have results.
			     */
			    if($player->getVideos() !== FALSE){
				    foreach($player->getVideos() as $videos) {
					    echo 'Video title: ';
					    var_dump($videos->title);

					    /**
					     * See below for hasOne() logic.
					     */
					    if($videos->getSports() !== FALSE) {
						    echo 'Video Sport name: ';
						    var_dump($videos->getSports()->name);
					    }
				    }
			    }

			    /**
			     * This is a hasOne() relation, so it works differently.
			     *
			     * Since a single player row can only have one sport, it's a
			     * hasOne() relationship. Since it's a hasOne(), it will automatically
			     * return an object typeof __CLASSNAME__
			     */
			    if($player->getSports() !== FALSE) {
				    echo 'Player sport: ';
				    var_dump($player->getSports()->name);
			    }

			    if($player->getSchools() !== FALSE) {
				    echo 'Player school: ';
				    var_dump($player->getSchools()->name);
			    }
		    }

		    exit;
	    }
	}