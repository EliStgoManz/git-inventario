<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
date_default_timezone_set("America/Mexico_City");
class Login extends CI_Controller {

		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 


  }


	public function index()
	{
		$this->load->view('login');
	}

	public function validar()
	{
		$usuario=$_REQUEST['usuario'];
		$contrasena= $_REQUEST['contrasena'];
		$url = asset_url();
		
		if ( $usuario==null or $contrasena ==null){
				$this->index();
		}else{
			$resultado=$this->validarUsuario($usuario,$contrasena); 

			if ($resultado == 1){
				redirect('panel');

		    }else{
					$this->index();
		    }
		}
	}

	function validarUsuario($usuario, $contrasena)
	{
		$valoret=1;
		
		$sql = "select * from usuario where user='$usuario' and pass='$contrasena'";
   		$consulta = $this->db->query($sql);		
		
		foreach ($consulta->result() as $fila)
		{
			$_SESSION['usuario']=$fila->id;
			$_SESSION['nombre']=$fila->nombre." ".$fila->paterno." ".$fila->materno;
			$_SESSION['privilegio']=$fila->perfil;
			$_SESSION['gc']=$fila->gc;
			$_SESSION['agregado']="no";	
			$_SESSION['editado']="no";	
			$_SESSION['eliminado']="no";
			$_SESSION['ausc']="no";
			$_SESSION['sc']="0";
		    $valoret=1;
		}

		return $valoret;
	}	

	function logout()
	{
		session_destroy();
		redirect('login','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */