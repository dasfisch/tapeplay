<?php
    use \Exception;

    class Factory {
        private static $_myConf;
        private static $_singletons = array();

        public function __construct() {

        }

        public static function open($class='player', $type='general') {
            self::$_myConf =& new Configuration('factory.conf', '/etc/config/tapeplay/');
            echo dirname(__FILE__).'/'.$type.'/'.$class.'.php';
            if(!in_array($class, self::$_singletons)) {
                if(file_exists(dirname(__FILE__)        .'/'.$class.'.php')) {
                    return new $class;
                } else {
                    Throw new Exception('This class doesn\'t exist!');
                }
            }
        }
    }