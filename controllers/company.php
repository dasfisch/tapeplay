<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)

    global $controller, $route, $smarty;

    /**
     * This will be the catcher; part of the rewrite rules;
     *
     * The url will be like this:
     *      http://www.tapeplay.com/__CLASS__/__METHOD__/__ID__?params....
     *          eg: http://www.tapeplay.com/videos/view/23
     *              http://www.tapeplay.com/videos/view/23?utm=google.com&etc=soforth
     *              http://www.tapeplay.com/videos/notes
     *
     */
    if(isset($route->method)) {
        switch($route->method) {
            case 'about':
                $smarty->assign('file', 'company/about.tpl');
                $smarty->assign("title", 'About TapePlay');

                $smarty->display('home.tpl');

                break;
            case 'advertising':
                $smarty->assign('file', 'company/advertising.tpl');
                $smarty->assign("title", 'Advertise With TapePlay');

                $smarty->display('home.tpl');

                break;
            case 'contact':
                $smarty->assign('file', 'company/contact.tpl');
                $smarty->assign("title", 'Contact TapePlay');

                $smarty->display('home.tpl');

                break;
            case 'faq':
                $smarty->assign('file', 'company/faq.tpl');
                $smarty->assign("title", 'Frequently Asked Questions');

                $smarty->display('home.tpl');

                break;
            case 'getstarted':
                $smarty->assign('file', 'company/getstarted.tpl');
                $smarty->assign("title", 'Get Started With TapePlay');

                $smarty->display('home.tpl');

                break;
            case 'guidelines':
                $smarty->assign('file', 'company/dosandonts.tpl');
                $smarty->assign("title", 'Community Guidelines');

                $smarty->display('home.tpl');

                break;
            case 'share':
                $smarty->assign('file', 'company/share.tpl');
                $smarty->assign("title", 'Share TapePlay');

                $smarty->display('home.tpl');

                break;
            case 'help':
                $smarty->assign('file', 'company/helpcenter.tpl');
                $smarty->assign("title", 'Help Center');

                $smarty->display('home.tpl');

                break;
			case 'privacy':
				$smarty->assign('file', 'company/privacy-policy.tpl');
                $smarty->assign("title", 'Privacy Policy');

				$smarty->assign('divId', 'content-left-column');
				$smarty->display('home.tpl');

				break;
			case 'tos':
				$smarty->assign('file', 'company/terms-of-service.tpl');
                $smarty->assign("title", 'Terms of Service');

				$smarty->assign('divId', 'content-left-column');
				$smarty->display('home.tpl');

				break;

			case 'privacypop':
				$smarty->assign('file', 'company/privacy-policy.tpl');

				$smarty->assign('divId', 'popup-container');
				$smarty->display('popup.tpl');

				break;
			case 'tospop':
				$smarty->assign('file', 'company/terms-of-service.tpl');

				$smarty->assign('divId', 'popup-container');
				$smarty->display('popup.tpl');

				break;
			default:
                $smarty->assign('file', 'company/about.tpl');

                $smarty->display('home.tpl');

                break;
        }
    } else {
        header('Location:'.$controller->configuration->URLs['baseUrl'].'company/about/');
    }

/**
 *
Notice: Undefined index: postSport in C:\Users\Tim\Sites\tapeplay\controllers\user.php on line 517
Notice: Undefined variable: stats in C:\Users\Tim\Sites\tapeplay\server\dal\StatsDAO.php on line 49
Notice: Undefined index: postSport in C:\Users\Tim\Sites\tapeplay\controllers\user.php on line 558
 */







