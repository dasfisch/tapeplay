<?php
	class Cpaches extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->belongsTo('user_id', 'Users', 'id');
		}
	}