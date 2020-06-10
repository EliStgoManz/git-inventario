<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if($_SESSION!=null AND $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM' || $_SESSION['gc']==1)  {

class Curva extends CI_Controller {


		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 


  }

	public function index()
	{
		
		$this->load->view('head');
		$this->load->view('pantallaGradoCurvatura');
		$this->load->view('footer');
		if($_SESSION['agregado']=="exito"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Usuario Agregado Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['agregado']="no";		
		}

	}

	


}



}else{
	class Curva extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}