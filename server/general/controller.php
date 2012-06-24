<?php

    class Controller {
        public $configuration;
        public $header;

        public function __construct() {
            $this->configuration = new Configuration('general.conf', '/etc/config/tapeplay/');
            $this->_request = new Request();

            $this->before();
        }

        protected function before() {
            $this->header = '';

            $validator = new InputFilter();

            $this->_get = $validator->process($_GET);
            $this->_post = (isset($_POST) && isset($_POST['hash']) && $validator->validatePostHash($_POST['hash'])) ?
                            $validator->process($_POST) : null;
        }

        protected function after() {

        }

        public function open($file='', $location='') {
            if(empty($location)) {
                $location = $this->configuration->base['controller_location'];
            }

            if(file_exists($location.$file.'.php')) {
                include($location.$file.'.php');
            } else {
                Throw new Exception('File does not exist');
            }
        }
    }
