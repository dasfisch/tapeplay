<?php
require_once ("enum/controllers/AccountMethods.php");
require_once ("enum/AccountTypeEnum.php");
require_once("enum/AccountTypeEnum.php");

require_once("bll/SchoolBLL.php");
require_once("bll/StatsBLL.php");
require_once("bll/UserBLL.php");
require_once("bll/PlayerBLL.php");
require_once("bll/VideoBLL.php");
require_once("model/SearchFilter.php");

use tapeplay\server\bll\SchoolBLL;
use tapeplay\server\bll\StatsBLL;
use tapeplay\server\bll\VideoBLL;
use tapeplay\server\bll\UserBLL;
use tapeplay\server\model\SearchFilter;

global $controller, $dataValidator, $get, $inputFilter, $post, $route, $smarty, $userBLL;

if($userBLL->getUser()) {
    $step = $userBLL->getUser()->getStatus();

    if($step == AccountStatusEnum::$STEP2) {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/user/upload/') {
            $_SESSION['message']['message'] = 'You\'ve finished the first step, but you haven\'t uploaded a video! Upload one now!';
            $_SESSION['message']['type'] = 'error';

            Util::setHeader('user/upload/');
        }
    } elseif($step == AccountStatusEnum::$STEP3) {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/user/info/') {
            $_SESSION['message']['message'] = 'You\'ve uploaded a video. Now, finish up your profile!';
            $_SESSION['message']['type'] = 'error';

            Util::setHeader('user/info/');
        }
    }
}


// check for request method to see if we are posting data
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$posted = true;

	// cleanup post variable
	//$inputFilter = new InputFilter();
	//$_POST = $inputFilter->process($_POST);
}
else
{
	$posted = false;
}

if (isset($route->method))
{
	switch ($route->method)
	{
		case AccountMethods::$WELCOME: // http://www.tapeplay.com/account/welcome
            if(!$userBLL->getUser()) {
                header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
            }

			if ($posted)
			{

			}
			else
			{
				// determine which page to load
				$template = "user/login";

                /**
                 * @TODO: On user creation, player does not get created due to lack of sport;
                 * make column null true.
                 */

				switch ($userBLL->getAccountType())
				{
					case AccountTypeEnum::$PLAYER:
						$template = "account/welcome/playerWelcome.tpl";
						break;

					case AccountTypeEnum::$COACH:
						$template = "account/welcome/coachWelcome.tpl";
						break;

					case AccountTypeEnum::$SCOUT:
						$template = "account/welcome/scoutWelcome.tpl";
						break;
				}

//                echo $template;exit;

                $user = $userBLL->getUser();

                $videoBll = new VideoBLL();
                try {
                    $videos = $videoBll->getVideoSaves($user->getUserId());
                } catch(Exception $e) {
                    echo '<pre>';
                    var_dump($e);
                    exit;
                }
                $videoCount = (isset($videos[0]->count) && (int)$videos[0]->count > 0) ? (int)$videos[0]->count : 0;

                $statsBll = new StatsBLL();
                $stats = $statsBll->getPlayerStats((int)$user->getId(), (int)$user->getSport()->getId());

				// now display the template based on above selection
                $smarty->assign('hash', $inputFilter->createHash());
				$smarty->assign("savedVideoNumber", $videoCount);
                $smarty->assign("savedVideos", $videos);
                $smarty->assign("stats", $stats);
                $smarty->assign("statCount", count($stats));
                $smarty->assign("modder", ceil(count($stats) / 3));
                $smarty->assign("user", $user);
				$smarty->assign('file', $template);

				$smarty->display("home.tpl");
			}

			break;
        case AccountMethods::$FORGOT_PASSWORD:
            $message = new stdClass();
            $template = 'account/forgotpassword.tpl';

            if(isset($post['email']) && $post['email'] != '') {
                try {
                    $dataValidator->checkEmail($post['email']);

                    $search = new SearchFilter();

                    $search->setWhere('email', $post['email']);

                    $userBll = new UserBLL();
                    $user = $userBll->search($search);
                    if(isset($user) && !empty($user)) {
                        $hash = md5(base64_encode(implode($user)));

                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= "From: TapePlay Admin <digital-no-reply@tapeplay.com>\r\n";

                        $subject = 'Here\'s Your Password Reset';

                        $url = $controller->configuration->URLs['baseUrl'].'account/password/?auth='.$hash.'&email='.$post['email'];

                        $body = '
                                <div>
                                    <h3>Here\'s your passoword</h3>
                                    <p>
                                        Don\'t worry. It happens to the best of us. Just go <a href="'.$url.'">here</a>,
                                        and complete the form. That\'s it!
                                    </p>
                                </div>';

                        if(!mail($post['email'], $subject, $body, $headers)) {
                            $message->message = $post['email'];
                            $message->type = 'error';
                        } else {
                            $template = 'account/passwordreset.tpl';

                            $smarty->assign('file', $template);

                            $smarty->display('home.tpl');
                        }

                    } else {
                        $message->message = $post['email'].' is not a registered email address!';
                        $message->type = 'error';
                    }
                } catch(Exception $e) {
                    $message->message = $post['email'].' is not a valid email address!';
                    $message->type = 'error';
                }
            }

            $smarty->assign('file', $template);
            $smarty->assign('message', $message);

            $smarty->display('home.tpl');

            break;
        case 'password':
            if(isset($get['auth']) && $get['auth'] != '' && isset($get['email']) && $get['email'] != '') {
                $message = new stdClass();
                $search = new SearchFilter();

                $search->setWhere('method', 'users');
                $search->setWhere('email', $get['email']);

                $userBll = new UserBLL();
                $user = $userBll->search($search);

                if(strcmp(md5(base64_encode(implode($user))), $get['auth']) === -1) {
                    \Util::setHeader($controller->configuration->URLs['baseUrl']);
                }

                if(isset($post) && isset($post['password']) && !empty($post['password'])) {
                    $hash = $userBLL->createHash($post["email"], $post["password"]);

                    $user[0]->setHash($hash);

                    if($userBLL->update($user[0])) {
                        if(isset($user[0])) {
                            $player = $userBLL->getPlayerUser($user[0]->getUserId());

                            if(isset($player)) {
                                $userBLL->setUser($player);

                                \Util::setHeader($controller->configuration->URLs['baseUrl']);
                            }
                        }
                    } else {
                        $message->message = 'There was an error processing your request. Please try again!';
                        $message->type = 'error-alert';
                    }
                }

                if(isset($user[0]) && !empty($user[0])) {
                    $template = 'account/passwordresetform.tpl';

                    $smarty->assign('file', $template);
                    $smarty->assign('email', $get['email']);
                    $smarty->assign('message', $message);
                    $smarty->assign('auth', $get['auth']);

                    $smarty->display('home.tpl');
                } else {
                    \Util::setHeader($controller->configuration->URLs['baseUrl']);
                }
            } else {
                \Util::setHeader($controller->configuration->URLs['baseUrl']);
            }

            break;
	}
}
else
{
	/**
	 * If method isn't set, do a default action;
	 * I think that the best will be a basic view all.
	 */
}
