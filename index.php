<?php
    namespace tapeplay\server;

	session_start();
    ini_set('display_errors', 'On');

    include('constants.php');

    include_once('general/controller.php');
    include_once('general/configuration.php');
    include_once('general/datavalidator.php');
    include_once('general/inputfilter.php');
    include_once('general/request.php');
    include_once('general/route.php');
    include_once('general/tapeplay.smarty.php');

    include_once('model/SearchFilter.php');

    include_once('bll/UserBLL.php');
    include_once('bll/SportBLL.php');

    use tapeplay\server\bll\SportBLL;
	use tapeplay\server\bll\UserBLL;
    use tapeplay\server\general\Configuration;
    use tapeplay\server\general\Controller;
    use tapeplay\server\general\DataValidator;
    use tapeplay\server\general\InputFilter;
    use tapeplay\server\general\Route;
    use tapeplay\server\general\TapePlaySmarty;
    use tapeplay\server\model\SearchFilter;

    global $configuration, $controller, $dataValidator, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    $configuration = new Configuration('general.conf', CONFIG_LOCATION);
    $controller = new Controller();
    $dataValidator = new \DataValidator();
    $inputFilter = new InputFilter();
    $route = new Route($_GET);
    $smarty = new TapePlaySmarty();

    $get = $inputFilter->process($_GET);
    $post = $inputFilter->process($_POST);

    $message = new \stdClass();
    $sport = null;
	$user_id = -1;

    $isLoggedIn = true;

    if(isset($_SESSION['message']['message']) && !empty($_SESSION['message']['message']) && $_SESSION['message']['message'] != '') {
        $message->message = $_SESSION['message']['message'];
        $message->type = $_SESSION['message']['type'];
    }

    unset($_SESSION['message']);

    $limit = 10;
    $page = (isset($get['page']) && $get['page'] > 0) ? $get['page'] : 1;

    $search = new SearchFilter();

    if(isset($_SESSION['sport'])) {
        $sport = $_SESSION['sport'];
    }

    if(isset($post['chosenSport']) && !empty($post['chosenSport'])) {
        $sport['id'] = $_SESSION['sport']['id'] = intval($post['chosenSport']);
    }

	// setup User BLL
	$userBLL = new UserBLL();

	// load user from session, if present
	if(isset($_SESSION['user'])) {
		// load up user for BLL if we have a session for it
		$userBLL->loadUser();
	}
	else if(isset($_SESSION['accountType'])) {
		$userBLL->setAccountType($_SESSION['accountType']);
	}

    $sportBll = new SportBLL();
    $sports = $sportBll->get($search);

    try {
        $sport['name'] = $sportBll->getNameFromId($sport['id'], $sports);

        $smarty->assign('sport', $sport);
        $smarty->assign('sports', $sports);
        $smarty->assign('currentSport', $sport);
        $smarty->assign('message', $message);

		$smarty->assign('loginText', $userBLL->isAuthenticated() ? "Log out" : "Login");
		$smarty->assign('loginAction', $userBLL->isAuthenticated() ? "logout" : "login");
        /**
         * ALL MENTIONS OF __CLASS__ MEAN THE CONTROLLER FILE
         *
         * Open the controller if the __CLASS__ parameter is set in the $_GET;
         * Otherwise, open up the index template
         */
        if(isset($route->class)) {
            //open the class file
            if(isset($sport) && isset($sport['name'])) {
                $controller->open($route->class);
            } else {
                if($route->class == 'user' && ($route->method == 'login' || $route->method == 'signup')) {
                    $controller->open($route->class);
                } elseif($route->class == 'account' && ($route->method == 'password' || $route->method == 'forgot')) {

                } else {
                    \Util::setHeader($configuration->configuration->URLs['baseUrl']);

                    exit;
                }
            }
        } else {
            //open the home page
            $controller->open('home');
        }
    } catch(\Exception $e) {
        echo '<pre>';
        var_dump($e);
        exit;
    }
