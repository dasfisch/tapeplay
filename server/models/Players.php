<?php
	class Players extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->belongsTo('user_id', 'Users', 'id', array('foreignKey' => true));
			$this->belongsTo('id', 'PlayerStats', 'player_id', array('foreignKey' => true));

			$this->hasMany('sport_id', 'Sports', 'id');
			$this->hasMany('player_id', 'PlayerStats', 'id', array('foreignKey' => true));
		}
	}