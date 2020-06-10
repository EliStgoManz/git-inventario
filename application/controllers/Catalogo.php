<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if($_SESSION!=null)  {

class Catalogo extends CI_Controller {


		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 


  }

	public function index()
	{
		$catalogos=$this->catalogo_model->getAll();
		$this->load->view('head');
		$this->load->view('pantallaCatalogoCatalogos',compact('catalogos'));
		$this->load->view('footer');
		if($_SESSION['agregado']=="exito"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Categoria Agregada Correctamente!\",
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
		$this->load->view('head');
		$this->load->view('pantallaAltaCategoria');
		$this->load->view('footer');
	}

	public function items()
	{
		$id=$_GET['id'];
		$tipo=$_GET['tipo'];
		$catalogo=$this->catalogo_model->getById($id);
		
		
		$this->load->view('head');
		if($tipo==1){
			$items=$this->catalogo_model->getItems($id);
			$this->load->view('pantallaCatalogoItems',compact('catalogo','items'));
		}else if($tipo==2){
			$itemsclave=$this->catalogo_model->getItemsClave($id);
			$this->load->view('pantallaCatalogoItemsClave',compact('catalogo','itemsclave'));
		}	
		$this->load->view('footer');
		if($_SESSION['agregado']=="exitoItem"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Elemento Agregado Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['agregado']="no";	
		}
	}

	public function altaItem()
	{
		$id=$_GET['id'];
		$this->load->view('head');
		$this->load->view('pantallaAltaItemCategoria',compact('id'));
		$this->load->view('footer');
	}

	public function altaItemClave()
	{
		$id=$_GET['id'];
		$this->load->view('head');
		$this->load->view('pantallaAltaItemClaveCategoria',compact('id'));
		$this->load->view('footer');
	}



	public function insertar(){
		$this->catalogo_model->insertar($_REQUEST['descripcion']);
		$_SESSION['agregado']="exito";
		redirect('catalogo', 'refresh');

	}

	public function insertarItem(){
		$this->catalogo_model->insertarItem($_REQUEST['descripcion'],$_REQUEST['id']);
		$_SESSION['agregado']="exitoItem";
		redirect('catalogo/items?id='.$_REQUEST['id'], 'refresh');

	}

	public function insertarItemClave(){
		$this->catalogo_model->insertarItem($_REQUEST['descripcion'],$_REQUEST['id']);
		$id=$this->catalogo_model->getMaxIdItem();
		$this->catalogo_model->insertarClave($_REQUEST['clave'],$id);
		$_SESSION['agregado']="exitoItem";
		redirect('catalogo/items?id='.$_REQUEST['id'], 'refresh');

	}

	public function editarItem(){
		$id=$_GET['id'];
		$item=$this->catalogo_model->getItemById($id);
		$this->load->view('head');
		$this->load->view('pantallaEditarItemCategoria',compact('id','item'));
		$this->load->view('footer');
		if($_SESSION['editado']=="exito"){

			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Elemento Editado Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['editado']="no";		
		}

	}

	public function actualizarItem(){
		$this->catalogo_model->actualizarItem($_REQUEST['descripcion'],$_REQUEST['id']);
		$_SESSION['editado']="exito";
		redirect('catalogo/editarItem?id='.$_REQUEST['id'], 'refresh');

	}


	public function json()
	{
		$json=json_encode($this->tramo_model->getJson());
		$this->load->view('jsonTramo',compact('json'));
	}



}



}else{
	class Catalogo extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}