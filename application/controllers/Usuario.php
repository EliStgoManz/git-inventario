<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if($_SESSION!=null AND $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM')  {

class Usuario extends CI_Controller {


		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 


  }

	public function index()
	{
		$usuarios=$this->usuario_model->getAll();
		$this->load->view('header');
		$this->load->view('pantallaCatalogoUsuarios',compact('usuarios'));
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

	public function alta()
	{
		$this->load->view('header');
		$this->load->view('pantallaAltaUsuario');

	}



	public function insertar(){
		$ds= isset($_POST['ds']) && $_POST['ds']  ? "1" : "0";
		$dh= isset($_POST['dh']) && $_POST['dh']  ? "1" : "0";
		$dv= isset($_POST['dv']) && $_POST['dv']  ? "1" : "0";
		$ml= isset($_POST['ml']) && $_POST['ml']  ? "1" : "0";
		$sn= isset($_POST['sn']) && $_POST['sn']  ? "1" : "0";
		$gc= isset($_POST['gc']) && $_POST['gc']  ? "1" : "0";
		$usuario= new Usuario_Model();
		$usuario->setNombre($_REQUEST['nombre']);
		$usuario->setPaterno($_REQUEST['paterno']);
		$usuario->setMaterno($_REQUEST['materno']);
		$usuario->setUsuario($_REQUEST['usuario']);
		$usuario->setPass($_REQUEST['pass']);
		$usuario->setPerfil('CMN');
		$usuario->setDS($ds);
		$usuario->setDH($dh);
		$usuario->setDV($dv);
		$usuario->setML($ml);
		$usuario->setSN($sn);
		$usuario->setGC($gc);
		$this->usuario_model->insertar($usuario);
		$_SESSION['agregado']="exito";
		redirect('usuario', 'refresh');


	}

	public function perfil()
	{
		$usuario=$this->usuario_model->getPerfilUsuario();
		$this->load->view('header');
		$this->load->view('pantallaEditarUsuario',compact('usuario'));
		if($_SESSION['editado']=="exito"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Usuario Editado Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['editado']="no";		
		}
	}

	public function editar()
	{
		$id=$_GET['id'];
		$usuario=$this->usuario_model->getById($id);
		$this->load->view('header');
		$this->load->view('pantallaEditarUsuario',compact('usuario'));
		if($_SESSION['editado']=="exito"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Usuario Editado Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['editado']="no";		
		}
	}

	public function permisos()
	{
		$id=$_GET['id'];
		$usuario=$this->usuario_model->getById($id);
		$tramos=$this->tramo_model->getAll();
		$permitidos=$this->usuario_model->getTramosPermitidos($id);
		$this->load->view('head');
		$this->load->view('pantallaPermisosUsuario',compact('usuario','tramos','permitidos'));
		$this->load->view('footer');
		if($_SESSION['editado']=="exito"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Permisos Editados Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['editado']="no";		
		}
	}

	public function insertarPermisos()
	{
		$id=$_REQUEST['id'];
		$this->usuario_model->eliminarPermisos($id);
		if(isset($_POST['tramos'])){
			foreach ($_POST['tramos'] as $tramo)
			{
	        $this->usuario_model->insertarPermisos($id,$tramo);
			}
		}
		$_SESSION['editado']="exito";
		redirect('usuario/permisos?id='.$_REQUEST['id'], 'refresh');
	}

	public function modificar()
	{
		$ds= isset($_POST['ds']) && $_POST['ds']  ? "1" : "0";
		$dh= isset($_POST['dh']) && $_POST['dh']  ? "1" : "0";
		$dv= isset($_POST['dv']) && $_POST['dv']  ? "1" : "0";
		$ml= isset($_POST['ml']) && $_POST['dv']  ? "1" : "0";
		$sn= isset($_POST['sn']) && $_POST['dv']  ? "1" : "0";
		$gc= isset($_POST['gc']) && $_POST['gc']  ? "1" : "0";
		$usuario= new Usuario_Model();
		$usuario->setId($_REQUEST['id']);
		$usuario->setNombre($_REQUEST['nombre']);
		$usuario->setPaterno($_REQUEST['paterno']);
		$usuario->setMaterno($_REQUEST['materno']);
		$usuario->setPass($_REQUEST['pass']);
		$usuario->setDS($ds);
		$usuario->setDH($dh);
		$usuario->setDV($dv);
		$usuario->setML($ml);
		$usuario->setSN($sn);
		$usuario->setGC($gc);
		$this->usuario_model->actualizar($usuario);
		
		$_SESSION['editado']="exito";
		redirect('usuario/editar?id='.$_REQUEST['id'], 'refresh');
		
	}




	public function json()
	{
		$json=json_encode($this->tramo_model->getJson());
		$this->load->view('jsonTramo',compact('json'));
	}



}



}else{
	class Usuario extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
		
	}
}