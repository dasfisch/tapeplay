<?php
	class VideosController extends IndexController {
		public function indexAction() {
			/**
			 * GET CURRENT PHALCON VERSION, duh.
			 */
			echo Phalcon\Version::get();

			exit;
		}

		public function viewAction() {
			/**
			 * This will always return an array;
			 * param 0 will always be the int
			 */
			$params = $this->dispatcher->getParams();

			$id = $params[0];

			try {
				$cache = $this->di->get('modelsCache');
				$key = $this->router->getControllerName().'_'.$this->router->getActionName().'_4_'.$id;

				$video = Videos::findFirst(array(
					'id='.$id,
//					'cache' => array(
//						'key' => $key
//					)
				));

				echo '<pre>';
				var_dump($video);
				echo '</pre>';

				$video = $cache->get($key);

				echo '<pre>';
				var_dump($video);
				exit;

				if($video) {
					$this->view->setVar('title', $video->title.' :: TapePlay');
					$this->view->setVar('video', $video);
				} else {
					echo 'NONE FOUND';
				}
			} catch(Exception $e) {
				echo 'ERROR <pre>';
				var_dump($e);
				exit;
			}
		}
	}