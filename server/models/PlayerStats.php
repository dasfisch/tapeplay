<?php
	class PlayerStats extends \Phalcon\Mvc\Model {
		/**
		 * Set database name as there is no PlayerStats DB
		 *
		 * @return string
		 */
		public function getSource() {
	        return 'player_stats';
	    }

		public function initialize() {
			$this->hasMany('player_id', 'Players', 'id');
			$this->hasMany('stat_id', 'Stats', 'id');
		}
	}