<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
session_start();

if($_SESSION!=null)  {

class Seccion extends CI_Controller {
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
        $secciones=$this->seccion_model->getAll();
        $this->load->view('header');
        $this->load->view('pantallaCatalogoSeccion',compact('secciones'));
        if($_SESSION['agregado']=="exito"){
            
                        $this->output->append_output("<script>
                            $(document).ready(function() {
                            swal({
                            title: \"Exito!\",
                            text: \"Sección Agregada Correctamente!\",
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
                            text: \"Sección Eliminada Correctamente!\",
                            type: \"success\"
                            });
            
                            });
                            </script>"
                    );
                    $_SESSION['eliminado']="no";		
        }
        
	} 
    
    public function alta() { 
        $this->load->view('header');
		$this->load->view('pantallaAltaSeccion');
    } 

    public function editar() { 
        $id=$_GET['id'];
        $seccion=$this->seccion_model->getById($id);
        $this->load->view('header');
        $this->load->view('pantallaEditarSeccion',compact('seccion'));
        if($_SESSION['editado']=="exito"){
            
                        $this->output->append_output("<script>
                            $(document).ready(function() {
                            swal({
                            title: \"Exito!\",
                            text: \"Sección Editada Correctamente!\",
                            type: \"success\"
                            });
            
                            });
                            </script>"
                    );
                    $_SESSION['editado']="no";		
        }
    } 
    
    public function insertar(){
        $this->seccion_model->insertar($_REQUEST['descripcion']);
		$_SESSION['agregado']="exito";
		redirect('seccion/catalogo', 'refresh');
    }

    public function select(){
        $id=$_GET['sc'];
        $_SESSION['sc']=$id;
        redirect('tramo', 'refresh');
    }

    public function tramo(){
        $id=$_GET['id'];
        $tramos=$this->tramo_model->getAll();
        $asignados=$this->tramo_model->getBySeccionId($id);        
        $this->load->view('header');
        $this->load->view('pantallaSeccionTramos',compact('tramos','asignados','id'));
        if($_SESSION['editado']=="exito"){
            
                        $this->output->append_output("<script>
                            $(document).ready(function() {
                            swal({
                            title: \"Exito!\",
                            text: \"Tramos Asignados Correctamente!\",
                            type: \"success\"
                            });
            
                            });
                            </script>"
                    );
                        $_SESSION['editado']="no";		
        }
    }

    public function asignarTramos(){
        $id=$_REQUEST['id'];
		$this->seccion_model->eliminarTramos($id);
		if(isset($_POST['tramos'])){
			foreach ($_POST['tramos'] as $tramo)
			{
	        $this->seccion_model->asignarTramos($id,$tramo);
			}
		}
		$_SESSION['editado']="exito";
		redirect('seccion/tramo?id='.$_REQUEST['id'], 'refresh');
    }

    public function actualizar(){
		$this->seccion_model->actualizar($_REQUEST['descripcion'],$_REQUEST['id']);
		$_SESSION['editado']="exito";
		redirect('seccion/editar?id='.$_REQUEST['id'], 'refresh');

    }
    
    public function eliminar()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$id=$_GET['id'];
			$this->seccion_model->eliminarTramos($id);
			$this->dispositivoSeguridad_model->eliminarSc($id);
			$this->dispositivoSeguridadDH_model->eliminarSc($id);
			$this->dispositivoSeguridadDV_model->eliminarSc($id);
			$this->dispositivoSeguridadML_model->eliminarSc($id);
            $this->dispositivoSeguridadSN_model->eliminarSc($id);
            $this->seccion_model->eliminar($id);
			$this->usuario_model->log("Elimino Seccion ".$id);
			$_SESSION['eliminado']="exito";
		}else{
            redirect('pagenotfound', 'refresh');
        }
		redirect('seccion', 'refresh');
	}

	
}

}else{
	class Seccion extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}


?> 