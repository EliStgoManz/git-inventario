<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
session_start();

if($_SESSION!=null)  {

class Pagenotfound extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
    } 
 
    public function index() { 
		$this->load->view('header');
		$this->load->view('404');
		
    } 
} 

}else{
	class Pagenotfound extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}
?> 