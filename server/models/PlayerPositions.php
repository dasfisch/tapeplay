<?php
	class PlayerPositions extends \Phalcon\Mvc\Model {
		/**
		 * Set database name as there is no PlayerStats DB
		 *
		 * @return string
		 */
		public function getStats() {
	        return 'player_positions';
	    }

		public function initialize() {
			$this->hasMany('player_id', 'Players', 'id');
			$this->hasMany('position_id', 'Positions', 'id');
		}
	}