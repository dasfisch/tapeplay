<?php
	try {

	    //Register an autoloader
	    $loader = new \Phalcon\Loader();

	    $loader->registerDirs(array(
	        '../server/controllers/',
	        '../server/models/'
	    ));

//		$loader->registerClasses(
//		    array(
//		        "Player_Stats"         => "../server/models/Player_Stats.php",
//		    )
//		);

		$loader->register();

	    //Create a DI
	    $di = new Phalcon\DI\FactoryDefault();

	    //Setting up the view component
	    $di->set('view', function(){
	        $view = new \Phalcon\Mvc\View();
	        $view->setViewsDir('../server/views/');

	        return $view;
	    });

		$di->set('db', function(){
	        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
	            "host" => "127.0.0.1:3306",
	            "username" => "root",
	            "password" => "n3uraxis",
	            "dbname" => "tapeplay_phase_2"
	        ));
	    });

		//Set the models cache service
		$di->set('modelsCache', function(){
		    // Cache data for one day by default
		    $frontCache = new Phalcon\Cache\Frontend\Data(array(
		        "lifetime" => 86400
		    ));

		    // Memcached connection settings
		    $cache = new Phalcon\Cache\Backend\Memcache($frontCache, array(
		        "host"      => "localhost",
		        "port"      => "11211",
			    "statsKey"  => 'tp_cache_',
			    'persistent' => false
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
	    echo "PhalconException: ", $e->getMessage();
	} catch (Exception $e) {
		// WTF random erros?????
	}