<?php
    include("Smarty.class.php");

	class TapePlaySmarty extends Smarty {
		public $configVars;
		
		public function __construct()
		{
			parent::__construct();
			

            $this->setTemplateDir('_smarty/_templates/');
            $this->setCompileDir('_smarty/_templates_c/');
            $this->setConfigDir('_smarty/_configs/');
            $this->setCacheDir('_smarty/_cache/');
			
			$this->configLoad('smarty.conf');
			
//			$this->compile_check = false; 
//			$this->caching = true; 
			
//			$this->smarty->debugging = true;
			
			$this->configVars = $this->getConfigVars();
		}
	}