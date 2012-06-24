<?php
    class Route {
        public $baseUrl;
        public $class;
        public $method;
        public $protocol;
        public $url;

        public function __construct() {
            $this->getCurrentUrl();
            $this->_setParams();
            $this->_route();
        }

        public function set() {

        }

        private function _route() {
            $this->validateUrl($this->url);


        }

        public function validateUrl($url) {
            $this->protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
        }

        public function getCurrentUrl() {
            $url = 'http';

            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                $url .= "s";
            }

            $url .= "://";

            if ($_SERVER["SERVER_PORT"] != "80") {
                $url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
            } else {
                $url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            }

            $this->url = $url;
        }

        private function _setParams() {
            $params = array_filter(explode('/', $_SERVER['REQUEST_URI']));

            $this->class = isset($params[1]) && !empty($params[1]) ? $params[1] : null;
            $this->method= isset($params[2]) && !empty($params[2]) ? $params[2] : null;
        }
    }