<?php
    $error = false;
    $success = (isset($_GET['sent']) && $_GET['sent'] =='true') ? true : false;

    if(isset($_POST['email']) && $_POST['email'] != '') {
        $senderEmail = $_POST['email'];
        $targetEmail = 'lindsayeaustin@gmail.com';
        $messageSubject = 'TapePlay Sign Up';
        $redirectToReferer = true;
        $redirectURL = 'http://www.tapeplay.com/';
        //****************************************

        // mail content
        $umail = $_POST['umail'];

        // company email:
        $messageText =	'Email: '.$umail."\n";

        // client email:
        $messageHeaders =	'From: '.$senderEmail."\r\n".
                            'Reply-To: '.$senderEmail."\r\n".
                            'X-Mailer: PHP/'.phpversion();
        if (preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/',$targetEmail,$matches)) {
            if(mail($targetEmail, $messageSubject, $messageText, $messageHeaders)) {
                header("Location: ".@$_SERVER['HTTP_REFERER'].'?sent=true');
            } else {
                header("Location: ".$redirectURL);
            }
        } else {
            $error = true;
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>TapePlay</title>

        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/tapeplay.css" type="text/css" />
        <link rel="stylesheet" href="css/beta.css" type="text/css" />
    </head>
    <body id="beta">
        <div id="betaTop">
            <div id="header">
                <img src="/media/images/beta_logo.jpg" />
                <img src="/media/images/beta_img_beta.gif" class="beta" />
            </div>
            <h1>Video makes the world go round.</h1>
            <h2>The world's evolved. So has recruiting.</h2>
        </div>
        <div id="betaBottom">
            <p>
                We're a video sharing site that will bring sports recruiting into the digital age. We make it
                easy for athletes to get the important exposure they need to get to the next level.
            </p>
            <p>
                So get your best game tape ready and we'll notify you when the site is here.
                <br/>
                And if you know an athelete, please spread the word.
            </p>
            <?php if(!$success): ?>
                <form id="signUp" action="http://www.tapeplay.com/?sent=true" method="post">
                    <div class="inputField">
                        <div class="left"></div>
                        <div class="middle">
                            <input type="text" class="standard" id="email" name="email" value="Enter Email Address" />
                        </div>
                        <div class="right"></div>
                    </div>
                    <div class="bigButton black">
                        <div class="topRight whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle">
                            <input type="submit" value="Search" id="sendSearch" class="large black" />
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="status">
                    <div class="greenCheckMark"></div>
                    <span>An email invitation has been sent!</span>
                </div>
            <?php endif; ?>
            <p class="copy">&copy; <?php echo date('Y', strtotime('now')); ?> TapePlay. All rights reserved.</p>
        </div>
    </body>
</html>