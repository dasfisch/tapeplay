<?php
	class VideosController extends IndexController {
		public function indexAction() {
			echo 'hello';

			exit;
		}

		public function viewAction() {
			/**
			 * This will always return an array;
			 * param 0 will always be the int
			 */
			$params = $this->dispatcher->getParams();

			$id = $params[0];

			$cacheName = 'videoForView_'.$id;

			try {
				$video = Videos::findFirst(array(
					'id='.$id,
					'cache' => array(
						'key' => $this->router->getControllerName().'_'.$this->router->getActionName().'3_'.$id
					)
				));

				if($video) {
					$this->view->setVar('title', $video->title.' :: TapePlay');
					$this->view->setVar('video', $video);
				} else {
					echo 'NONE FOUND';
				}
			} catch(Exception $e) {
				echo '<pre>';
				var_dump($e);
				exit;
			}
		}
	}