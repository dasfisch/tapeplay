<?php
	class Sports extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->belongsTo('sport_id', 'Players',' id');
		}
	}