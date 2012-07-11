<?php
    namespace tapeplay\server\general;

    class Route {
        public $baseUrl;
        public $class;
        public $method;
        public $protocol;
        public $url;

        public function __construct($routes) {
            $this->configuration = new Configuration('general.conf', CONFIG_LOCATION);

            $this->getCurrentUrl();
            $this->_setParams($routes);
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

        private function _setParams($routes) {
            $params = array_filter(explode('/', $_SERVER['REQUEST_URI']));

            foreach($routes as $key=>$route) {
                $this->$key = $route;
            }
        }
    }