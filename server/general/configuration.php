<?php
    namespace tapeplay\server\general;

    class Configuration {
        private $_file;

        /**
         * Construct the params needed for the application
         *
         * @param $file string
         * @param $folder string
         * @param $section bool
         *
         * @    void
         */
        public function __construct($file='general.conf', $folder='/etc/config/', $section=true) {
            $this->_file = $folder.$file;

            if(!file_exists($this->_file)) {
                Throw new Exception('The file '.$this->file.' does not exist!', 800);
            }

            $values = parse_ini_file($this->_file, $section);

            foreach($this->_constructConfig($values) as $key=>$val) {
                $this->$key = $val;
            }
        }

        private function _constructConfig($values) {
            foreach($values as $key=>$value) {
                if(is_array($value) && !empty($values)) {
                    $final[$key] = $this->_constructConfig($value);
                } else {
                    $final[$key] = $value;
                }
            }

            return $final;
        }
    }