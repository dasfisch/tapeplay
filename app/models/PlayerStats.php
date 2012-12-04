<?php
	class PlayerStats extends \Phalcon\Mvc\Model {
		/**
		 * Set database name as there is no PlayerStats DB
		 *
		 * @return string
		 */
		public function getStats() {
	        return 'player_stats';
	    }

		public function initialize() {
			$this->belongsTo('player_id', 'Players', 'id');
			$this->belongsTo('stat_id', 'Stats', 'id');

			$this->hasMany('id', 'Players', 'player_id');
			$this->hasMany('id', 'Stats', 'stat_id');
		}
	}