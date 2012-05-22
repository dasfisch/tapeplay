<?php
    include_once('general/inputfilter.php');

    class Request {
        public function __construct() {}

        public function __get($var) {
            return $this->$var;
        }

        public function __set($var, $val) {
            $this->$var = $val;
        }

        /**
         * This will return you a get variable, or null, depending on state of $_GET
         */
        public function get($index) {
            $index = (string)$index;

            if(!isset($_GET) || empty($_GET)) {
                return null;
            }

            if(!isset($_GET[$index])) {
                return null;
            }

            return $_GET[$index];
        }

        public function post($index) {
            $index = (string)$index;

            if(!isset($_POST) || empty($_POST)) {
                return null;
            }

            if(!isset($_POST[$index])) {
                return null;
            }

            return $_POST[$index];
        }
    }