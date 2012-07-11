<?php
    namespace tapeplay\server;

	session_start();
    ini_set('display_errors', 'On');

    include('constants.php');

    include_once('general/controller.php');
    include_once('general/configuration.php');
//    include_once('general/factory.php');
    include_once('general/inputfilter.php');
    include_once('general/request.php');
    include_once('general/route.php');
    include_once('general/tapeplay.smarty.php');

    include_once('model/SearchFilter.php');

    include_once('bll/UserBLL.php');
    include_once('bll/SportBLL.php');

    use tapeplay\server\bll\SportBLL;
	use tapeplay\server\bll\UserBLL;
    use tapeplay\server\general\Controller;
    use tapeplay\server\general\InputFilter;
    use tapeplay\server\general\Route;
    use tapeplay\server\general\TapePlaySmarty;
    use tapeplay\server\model\SearchFilter;

    global $controller, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    $controller = new Controller();
    $inputFilter = new InputFilter();
    $route = new Route($_GET);
    $smarty = new TapePlaySmarty();

    $get = $inputFilter->process($_GET);
    $post = $inputFilter->process($_POST);

    $isLoggedIn = true;
    $sport = null;
	$user_id = -1;

    $limit = 10;
    $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;

    $search = new SearchFilter();

    if(isset($_SESSION['sport'])) {
        $sport = $_SESSION['sport'];
    }

    if(isset($_POST['chosenSport']) && !empty($_POST['chosenSport'])) {
        $sport = $_SESSION['sport'] = $_POST['chosenSport'];
    }

	// setup User BLL
	$userBLL = new UserBLL();

	// load user from session, if present
	if(isset($_SESSION['user'])) {
		// load up user for BLL if we have a session for it
		$userBLL->loadUser();
	}

	// load account type, if present
	if(isset($_SESSION['accountType'])) {
		$userBLL->setAccountType($_SESSION['accountType']);
	}

    $sportBll = new SportBLL();
    $sports = $sportBll->get($search);

    try {
        $smarty->assign('sports', $sports);
        $smarty->assign('currentSport', $sport);

        /**
         * ALL MENTIONS OF __CLASS__ MEAN THE CONTROLLER FILE
         *
         * Open the controller if the __CLASS__ parameter is set in the $_GET;
         * Otherwise, open up the index template
         */
        if(isset($route->class)) {
            //open the class file
            $controller->open($route->class);
        } else {
            //open the home page
            $controller->open('home');
        }
    } catch(\Exception $e) {
        echo '<pre>';
        var_dump($e);
        exit;
    }
