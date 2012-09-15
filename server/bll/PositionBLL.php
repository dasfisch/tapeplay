<?php

    namespace tapeplay\server\bll;

    require_once("dal/PositionDAO.php");
    require_once("bll/BaseBLL.php");

    use tapeplay\server\bll\BaseBLL;
    use tapeplay\server\dal\PositionDAO;

    class PositionBLL extends BaseBLL
    {
        function __construct()
        {
            $this->dal = new PositionDAO();
        }

        public function getPositionsByPlayer($player)
        {
            return $this->dal->getPositionsByPlayer($player);
        }

        public function getPositionsBySport($sportId)
        {
            return $this->dal->getPositionsBySport($sportId);
        }
    }