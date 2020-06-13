<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
session_start();

if($_SESSION!=null)  {

class Panel extends CI_Controller {
    function __construct()
    {
      parent::__construct();
      $this->load->helper('form');
       $this->load->helper('url'); 
       $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
      $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
  
    }
 
    public function index() { 
        $secciones=$this->seccion_model->getAllTotal();
        $this->load->view('header');
        $this->load->view('panel',compact('secciones'));
        
	} 
    
    

    public function tramos(){
        if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
            
            $tramos=$this->tramo_model->getAll();
        }else{
            redirect('pagenotfound');	
        }
        $this->load->view("header");
        $this->load->view('pantallaConfiguracionTramos',compact('tramos'));


        if($_SESSION['agregado']=="exito"){

            $this->output->append_output("<script>
                $(document).ready(function() {
                swal({
                title: \"Exito!\",
                text: \"Tramo Agregado Correctamente!\",
                type: \"success\"
                });

                });
                </script>"
        );
        $_SESSION['agregado']="no";		
        }else if($_SESSION['eliminado']=="exito"){
            $this->output->append_output("<script>
                $(document).ready(function() {
                swal({
                title: \"Exito!\",
                text: \"Tramo Eliminado Correctamente!\",
                type: \"success\"
                });

                });
                </script>"
        );
            $_SESSION['eliminado']="no";
        }else if($_SESSION['ausc']=="exito"){
            $this->output->append_output("<script>
                $(document).ready(function() {
                swal({
                title: \"Exito!\",
                text: \"Informacion de Auscultacion Actualizada Correctamente!\",
                type: \"success\"
                });

                });
                </script>"
        );
            $_SESSION['ausc']="no";
        }
        
    }

    

	
}

}else{
	class Panel extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}


?> 