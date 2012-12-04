<?php
	class Stats extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->hasMany('stat_id', 'PlayerStats', 'id');

			$this->belongsTo('stat_id', 'PlayerStats', 'id');
		}
	}