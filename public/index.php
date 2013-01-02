<?php
	try {
		global $config;

		$config = new Phalcon\Config\Adapter\Ini('../server/config/tapeplay.ini');

	    //Register an autoloader
	    $loader = new \Phalcon\Loader();

	    $loader->registerDirs(array(
	        '../server/controllers/',
	        '../server/models/'
	    ));

		$loader->register();

	    //Create a DI
	    $di = new Phalcon\DI\FactoryDefault();

		$di->set('session', function() {
		    $session = new Phalcon\Session\Adapter\Files();

			$session->start();

		    return $session;
		});

		$di->set('router', function() {
			$router = new \Phalcon\Mvc\Router();

			$router->setDefaultController('index');
			$router->setDefaultAction('index');

			$router->add('/:controller/:action/:int/', array(
				'controller'    => 1,
				'action'        => 2,
				'int'           => 3
			));

			$router->removeExtraSlashes(true);

			return $router;
		});

	    //Setting up the view component
	    $di->set('view', function(){
	        $view = new \Phalcon\Mvc\View();
	        $view->setViewsDir('../volt/');

		    $view->registerEngines(array(
	            ".volt" => '\Phalcon\Mvc\View\Engine\Volt'
	        ));

	        return $view;
	    });

		$di->set('db', function(){
			global $config;

	        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
	            "host" => $config->database->host,
	            "username" => $config->database->username,
	            "password" => $config->database->password,
	            "dbname" => $config->database->db
	        ));
	    });

		//Set the models cache service
		$di->set('modelsCache', function(){
		    // Cache data for one day by default
		    $frontCache = new \Phalcon\Cache\Frontend\Data(array(
		        "lifetime" => 86400
		    ));

		    // Memcached connection settings
		    $cache = new \Phalcon\Cache\Backend\Memcache($frontCache, array(
			    "host" => "localhost",
	            "port" => "11211"
		    ));

		    return $cache;
		});

	    //Handle the request
		$application = new \Phalcon\Mvc\Application();
        $application->setDI($di);

	    echo $application->handle()->getContent();
	} catch(PDOException $e) {
        echo '<pre>';
		var_dump($e);
		exit;
	} catch(\Phalcon\Exception $e) {
	    echo "PhalconException: ", $e->getMessage().'<br/> PhalconExceptionCode: '.$e->getCode().'<pre>';
		var_dump($e);
	} catch (Exception $e) {
		// WTF random erros?????
	}