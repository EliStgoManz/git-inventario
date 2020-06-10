<?php

class Exception404 extends Exception {
}


class MY_Controller extends CI_Controller {
	  public function _remap($method, $params = array()) {
	    try {
	      if (!method_exists($this, $method))
	        throw new Exception404();
	      return call_user_func_array(array($this, $method), $params);
	    } catch(Exception404 $e) {
	      $this->show_404();
	    }
	  }


	  protected function show_404() {
	    // clear any views that have already been loaded
	    $this->output->set_output('');
	    $this->output->set_status_header('404');

	    $this->load->view('pantallaInicio.php');

	  }
 }