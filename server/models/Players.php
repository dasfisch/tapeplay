<?php
	class Players extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->belongsTo('user_id', 'Users', 'id');

			$this->hasMany('id', 'Videos', 'player_id');
			$this->hasMany('id', 'PlayerPositions', 'player_id');
			$this->hasMany('id', 'PlayerStats', 'player_id');

			$this->hasOne('school_id', 'Schools', 'id');
			$this->hasOne('sport_id', 'Sports', 'id');
		}
	}