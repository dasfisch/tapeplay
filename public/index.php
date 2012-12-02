<?php
	try {

	    //Register an autoloader
	    $loader = new \Phalcon\Loader();
	    $loader->registerDirs(array(
	        '../server/controllers/',
	        '../server/models/'
	    ))->register();

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
	            "dbname" => "dev_tapeplay"
	        ));
	    });

	    //Handle the request
	    $application = new \Phalcon\Mvc\Application();
	    $application->setDI($di);

		echo '<pre>';
		var_dump($application->getDI()->get('db'));
		exit;

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