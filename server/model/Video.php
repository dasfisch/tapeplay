<?php

namespace tapeplay\server\model;

require_once('Player.php');

class Video
{
	public static function create($arr)
	{
        $player = new Player();
        $video = new Video();

        $video->setId($arr["0"]);
        $video->setPandaId($arr["panda_id"]);
        $video->setTitle($arr["title"]);
        $video->setUploadDate($arr["uploaded_date"]);
        $video->setRecordedMonth($arr["recorded_month"]);
        $video->setRecordedYear($arr["recorded_year"]);
        $video->setActive($arr["active"]);
        $video->setViews($arr["views"]);
        $video->setSaves($arr["saves"]);
        $video->setPrivacy($arr['is_private']);
        $video->setSportId($arr['sport_id']);

        if(isset($arr['first_name'])) {
            $video->setPlayer($player->create($arr));
        }

        $video->count = $arr['videoCount'];

		return $video;
	}

	private $_id;
	private $_pandaId;
	private $_title;
	private $_length;
	private $_recordedMonth;
	private $_recordedYear;
	private $_uploadDate;
	private $_views;
	private $_active;
	private $_comments;
	private $_saves;
    private $_sportId;
    private $_privacy;
    private $_player;

    /**
     * We should bring this down to two methods. The magic methods
     * will make our lives easier.
     *
     * This way we can just do the following:
     *
     * $this->_id = 23;
     * echo $this->_id;
     *
     * Or we can do as regular methods:
     *
     * $this->set('_id', 23);
     * $this->get('_id');
     */
//    public function __set($name, $value) {
//        $this->$name = $value;
//    }
//
//    public function __get($name) {
//        return $this->$name;
//    }


	public function setActive($active)
	{
		$this->_active = $active;
	}

	public function getActive()
	{
		return $this->_active;
	}

	public function setComments(array $comments)
	{
		$this->_comments = $comments;
	}

	public function getComments()
	{
		return $this->_comments;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setPandaId($pandaId)
	{
		$this->_pandaId = $pandaId;
	}

	public function getPandaId()
	{
		return $this->_pandaId;
	}

	public function setLength($length)
	{
		$this->_length = $length;
	}

	public function getLength()
	{
		return $this->_length;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setRecordedMonth($uploadMonth)
	{
		$this->_recordedMonth = $uploadMonth;
	}

	public function getRecordedMonth()
	{
		return $this->_recordedMonth;
	}

	public function setRecordedYear($uploadYear)
	{
		$this->_recordedYear = $uploadYear;
	}

	public function getRecordedYear()
	{
		return $this->_recordedYear;
	}

	public function setViews($views)
	{
		$this->_views = $views;
	}

	public function getViews()
	{
		return $this->_views;
	}

	public function setUploadDate($uploaded)
	{
		$this->_uploadDate = $uploaded;
	}

	public function getUploadDate()
	{
		return $this->_uploadDate;
	}

    public function setSaves($saves)
   	{
   		$this->_saves = $saves;
   	}

   	public function getSaves()
   	{
   		return $this->_saves;
   	}

    public function setPrivacy($privacy)
   	{
   		$this->_privacy = ((int)$privacy === 1) ? 1 : 0;
   	}

   	public function getPrivacy()
   	{
   		return $this->_privacy;
   	}

    public function setPlayer($user)
   	{
   		$this->_player = $user;
   	}

   	public function getPlayer()
   	{
   		return $this->_player;
   	}

    public function setSportId($sportId)
   	{
   		$this->_sportId = $sportId;
   	}

   	public function getSportId()
   	{
   		return $this->_sportId;
   	}
}