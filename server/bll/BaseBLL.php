<?php

namespace tapeplay\server\bll;

class BaseBLL
{
	protected $dal;

	public function getLastInsertID()
	{
		return $this->dal->getLastInsertId(null);
	}
}
