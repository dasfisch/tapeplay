<?php

require_once("enum/EmailEnum.php");

class Util
{
	/**
	 * Sets the header()'s "Location" property to the full URL of incoming relative URL.
	 * @static
	 * @param $relURL
	 */
	public static function setHeader($relURL)
	{
		global $controller;

		$fullURL = $controller->configuration->URLs['baseUrl'] . $relURL;

		header("Location: " . $fullURL);

        exit;
	}

    public static function sendEmail($emailType, $to, $subject, $template, $args=array()) {
        $sent = array();
        $failed = array();

		global $smarty;

        /**
         * generate email template
         */
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: TapePlay Admin <info@tapeplay.com>\r\n";

        if(count($args > 1)) {
            foreach($args as $key=>$arg) {
                $smarty->assign($key, $arg);
            }
        }

		// full year will always be included
		$smarty->assign("fullYear", date('Y'));
		$smarty->assign("emailAddress", $to);

        $body = $smarty->fetch($template, false);

        foreach($to as $key=>$email) {
            if(in_array($email, $sent)){
                continue;
            }

            if(mail($email, $subject, $body, $headers)) {
                $sent[] = $email;
            } else {
                $failed[] = $email;
            }
        }

        if(count($failed) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function getBrowser() {
        if (isset($_SERVER["HTTP_USER_AGENT"]) OR ($_SERVER["HTTP_USER_AGENT"] != "")) {
            $visitor_user_agent = $_SERVER["HTTP_USER_AGENT"];
        } else {
            $visitor_user_agent = "Unknown";
        }
        $bname = 'Unknown';
        $version = "0.0.0";

        // Next get the name of the useragent yes seperately and for good reason
        if (eregi('MSIE', $visitor_user_agent) && !eregi('Opera', $visitor_user_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (eregi('Firefox', $visitor_user_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (eregi('Chrome', $visitor_user_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (eregi('Safari', $visitor_user_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (eregi('Opera', $visitor_user_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (eregi('Netscape', $visitor_user_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        } elseif (eregi('Seamonkey', $visitor_user_agent)) {
            $bname = 'Seamonkey';
            $ub = "Seamonkey";
        } elseif (eregi('Konqueror', $visitor_user_agent)) {
            $bname = 'Konqueror';
            $ub = "Konqueror";
        } elseif (eregi('Navigator', $visitor_user_agent)) {
            $bname = 'Navigator';
            $ub = "Navigator";
        } elseif (eregi('Mosaic', $visitor_user_agent)) {
            $bname = 'Mosaic';
            $ub = "Mosaic";
        } elseif (eregi('Lynx', $visitor_user_agent)) {
            $bname = 'Lynx';
            $ub = "Lynx";
        } elseif (eregi('Amaya', $visitor_user_agent)) {
            $bname = 'Amaya';
            $ub = "Amaya";
        } elseif (eregi('Omniweb', $visitor_user_agent)) {
            $bname = 'Omniweb';
            $ub = "Omniweb";
        } elseif (eregi('Avant', $visitor_user_agent)) {
            $bname = 'Avant';
            $ub = "Avant";
        } elseif (eregi('Camino', $visitor_user_agent)) {
            $bname = 'Camino';
            $ub = "Camino";
        } elseif (eregi('Flock', $visitor_user_agent)) {
            $bname = 'Flock';
            $ub = "Flock";
        } elseif (eregi('AOL', $visitor_user_agent)) {
            $bname = 'AOL';
            $ub = "AOL";
        } elseif (eregi('AIR', $visitor_user_agent)) {
            $bname = 'AIR';
            $ub = "AIR";
        } elseif (eregi('Fluid', $visitor_user_agent)) {
            $bname = 'Fluid';
            $ub = "Fluid";
        } else {
            $bname = 'Unknown';
            $ub = "Unknown";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
                ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $visitor_user_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($visitor_user_agent, "Version") < strripos($visitor_user_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return array(
            'userAgent' => $visitor_user_agent,
            'name' => $bname,
            'version' => $version,
            'pattern' => $pattern
        );
    }
}
