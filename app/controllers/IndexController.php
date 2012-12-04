<?php
	class IndexController extends \Phalcon\Mvc\Controller {
	    public function indexAction() {
		    $users = new Users();

//		    $players = new PlayerStats();

		    echo '<pre>';
//		    var_dump($users->findFirst(57)->getPlayers()->getSports()->count());
//		    exit;


		    foreach($users->findFirst(57)->getPlayers() as $player) {
			    foreach($player->getSports() as $sport) {
				    var_dump($sport->name);
			    }
		    }

		    exit;
	    }
	}