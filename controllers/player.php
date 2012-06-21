<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */

if($video) {
  $smarty->assign('video', $video);
  $smarty->display('views/video.php');
}
