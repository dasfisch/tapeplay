<?php
	class Users extends \Phalcon\Mvc\Model {
		public function initialize() {
			$this->hasMany('id', 'Players', 'user_id', array('foreignKey' => true));
		}
	}