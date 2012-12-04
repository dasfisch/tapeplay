<?php
	class Videos extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->belongsTo('player_id', 'Players', 'id');

			$this->hasOne('sport_id', 'Sports', 'id');
		}
	}