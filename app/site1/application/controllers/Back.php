<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller  {

    public function __construct() {
        parent::__construct();
        $this->check_jwt();
        $this->set_jwt();
    }


	private function check_jwt()
	{
        echo $this->router->method();
	}

	private function set_jwt(){

    }

}
