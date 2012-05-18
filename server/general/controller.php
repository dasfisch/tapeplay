<?php

    class Controller {
        public $configuration;
        public $header;

        public function __construct() {
            $this->_configuration = new Configuration('general.conf', '/etc/config/tapeplay/');
            $this->_request = new Request();

            $this->before();
        }

        protected static function before() {
            $this->header = '';

            $validator = new InputFilter();

            $this->_get = $validator->process($_GET);
            $this->_post = (isset($_POST) && isset($_POST['hash']) && $validator->validatePostHash($_POST['hash'])) ? $validator->process($_POST) : null;
        }

        protected static function after() {

        }
    }
