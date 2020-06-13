<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
session_start();

if($_SESSION!=null)  {

class Tramo extends CI_Controller {


		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 
     $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
    $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 

  }

	public function index()
	{
		
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
					
		$tramos=$this->tramo_model->getBySeccion();
		}else{
		$tramos=$this->tramo_model->getPermitidos();	
		}
		$this->load->view("head");
		$this->load->view('pantallaCatalogoTramos',compact('tramos'));
		$this->load->view('footer');

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

	public function alta()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$clasificaciones=$this->catalogo_model->getItems(10);	
		$cuerpos=$this->catalogo_model->getItems(11);	
		$this->load->view('header');
		$this->load->view('pantallaAltaTramo',compact('clasificaciones','cuerpos'));

		}else{
			redirect('pagenotfound','refresh');
		}
	}

	public function mapa()
	{
		$id=$_GET['id'];
		$clave=$this->tramo_model->getClave($id);
		$this->load->view('head');
		$this->load->view('pantallaTramoMapa',compact('clave','id'));
		$this->load->view('footer');
	}

	public function kml()
	{
		$id=$_GET['id'];
		$clave=$this->tramo_model->getClave($id);
		$detalles=$this->tramo_model->getDetallesByTramo($id);
		$myfile = fopen("assets/mapas/".$clave.".kml", "w");
		$kml = array('<?xml version="1.0" encoding="UTF-8"?>'); 
		$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2">';
		$kml[] = '<Document>';
		$kml[] = '<name>'.$clave.'</name>';
		$kml[] = '<Style id="blueLine">';
		$kml[] = '<LineStyle>';
		$kml[] = '<color>ffff0000</color>';
		$kml[] = '<width>4</width>';
		$kml[] = '</LineStyle>';
		$kml[] = '</Style>';
		$kml[] = '<Placemark>';
		$kml[] = '<name>Blue Line</name>';
		$kml[] = '<styleUrl>#blueLine</styleUrl>';
		$kml[] = '<LineString>';
		$kml[] = '<altitudeMode>relative</altitudeMode>';
		$kml[] = '<coordinates>';
		foreach ($detalles as $valor) {
		$kml[] = $valor->longitud.','.$valor->latitud;
		}
		$kml[] = '</coordinates>';
		$kml[] = '</LineString>';
		$kml[] = '</Placemark>';
		$kml[] = '</Document>';
		$kml[] = '</kml>';
		$kmlOutput = join("\n", $kml);
		fwrite($myfile, $kmlOutput);
		fclose($myfile);
		redirect('tramo/mapa?id='.$id,'refresh');
	}



	public function dispositivo()
	{
		$id=$_GET['id'];
		$sentido=$_GET['sentido'];
		$carretera=$this->tramo_model->getCarreteraNom($id);
		$clave=$this->tramo_model->getClave($id);
		$minicio=$this->tramo_model->getKmInicial($id);
		$dispositivos=$this->catalogo_model->getItems(1);
		$designacion=$this->catalogo_model->getItemsClave(2);
		$sistemas=$this->catalogo_model->getItems(3);
		$postes=$this->catalogo_model->getItems(4);
		$secextremas=$this->catalogo_model->getItems(5);
		$bartransicion=$this->catalogo_model->getItems(6);
		$estfisico=$this->catalogo_model->getItems(12);
		$nombremarcas=$this->catalogo_model->getItemsClave(7);
		$coloresmarca=$this->catalogo_model->getItems(8);
		$preventivas=$this->catalogo_model->getItemsCat(9,1);
		$restrictivas=$this->catalogo_model->getItemsCat(9,2);
		$identificacion=$this->catalogo_model->getItemsCat(9,3);
		$destino=$this->catalogo_model->getItemsCat(9,4);
		$recomendacion=$this->catalogo_model->getItemsCat(9,5);
		$general=$this->catalogo_model->getItemsCat(9,6);
		$servicios=$this->catalogo_model->getItemsCat(9,7);
		$turisticas=$this->catalogo_model->getItemsCat(9,8);
		$pendiente=$this->catalogo_model->getItemsCat(9,9);
		$usuario=$this->usuario_model->getPrivilegios();		
		$this->load->view('head');
		$this->load->view('pantallaAltaDispositivos',compact('clave','minicio','dispositivos','designacion','sistemas','postes','secextremas','bartransicion','estfisico','coloresmarca','nombremarcas','preventivas','restrictivas','identificacion','destino','recomendacion','general','servicios','turisticas','pendiente','sentido','id','usuario','carretera'));
		$this->load->view('footer');
	}

	public function dispositivo360()
	{
		$id=$_GET['id'];
		$sentido=$_GET['sentido'];
		$carretera=$this->tramo_model->getCarreteraNom($id);
		$clave=$this->tramo_model->getClave($id);
		$minicio=$this->tramo_model->getKmInicial($id);
		$dispositivos=$this->catalogo_model->getItems(1);
		$designacion=$this->catalogo_model->getItemsClave(2);
		$sistemas=$this->catalogo_model->getItems(3);
		$postes=$this->catalogo_model->getItems(4);
		$secextremas=$this->catalogo_model->getItems(5);
		$bartransicion=$this->catalogo_model->getItems(6);
		$estfisico=$this->catalogo_model->getItems(12);
		$nombremarcas=$this->catalogo_model->getItemsClave(7);
		$coloresmarca=$this->catalogo_model->getItems(8);
		$preventivas=$this->catalogo_model->getItemsCat(9,1);
		$restrictivas=$this->catalogo_model->getItemsCat(9,2);
		$identificacion=$this->catalogo_model->getItemsCat(9,3);
		$destino=$this->catalogo_model->getItemsCat(9,4);
		$recomendacion=$this->catalogo_model->getItemsCat(9,5);
		$general=$this->catalogo_model->getItemsCat(9,6);
		$servicios=$this->catalogo_model->getItemsCat(9,7);
		$turisticas=$this->catalogo_model->getItemsCat(9,8);
		$pendiente=$this->catalogo_model->getItemsCat(9,9);
		$usuario=$this->usuario_model->getPrivilegios();		
		$this->load->view('head');
		$this->load->view('pantallaAltaDispositivos360',compact('clave','minicio','dispositivos','designacion','sistemas','postes','secextremas','bartransicion','estfisico','coloresmarca','nombremarcas','preventivas','restrictivas','identificacion','destino','recomendacion','general','servicios','turisticas','pendiente','sentido','id','usuario','carretera'));
		$this->load->view('footer');
	}

	public function detalles()
	{
		$id=$_GET['id'];
		$clave=$this->tramo_model->getClave($id);
		$detalles=$this->tramo_model->getDetallesByTramo($id);
		$this->load->view('head');
		$this->load->view('pantallaCatalogoKmTramo',compact('clave','detalles'));
		$this->load->view('footer');
	}
	
	public function imagenes()
	{
		$this->load->view('head');
		$this->load->view('pantallaSubir');
		$this->load->view('footer');
	}
	
	public function subir()
	{
		$storagename = "img/img/imagenes.zip";
		if (file_exists($_FILES["file"]["name"])) { unlink($_FILES["file"]["name"]); }
		move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);
	}




	public function insertar(){
		$storagename = "excel/tramo.xlsx";
		if (file_exists($_FILES["file"]["name"])) { unlink($_FILES["file"]["name"]); }
		move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);
		$this->load->library('excel');
        $objPHPExcel = PHPExcel_IOFactory::load('excel/tramo.xlsx');
        $filas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        $objPHPExcel->getActiveSheet()->getStyle('E2:G'.$filas)->getNumberFormat()->setFormatCode('0000000000');
        $get_sheetData = "";
        $sheet = $objPHPExcel->getSheet(0);
        $get_sheetData=$sheet->toArray(null,true,true,true);        
        $long=$get_sheetData[$filas]['D']/1000;
        $minicial=0;
        $clave=$_REQUEST['clave'];
        $mfin=$minicial+$get_sheetData[$filas]['D'];
		$tramo= new Tramo_Model();
		$tramo->setCarretera($_REQUEST['carretera']);
		$tramo->setClaveTramo($clave);
		$tramo->setRuta($_REQUEST['ruta']);
		$tramo->setCiudadInicio($_REQUEST['origen']);
		$tramo->setCiudadFin($_REQUEST['destino']);
		$tramo->setClasificacion($_REQUEST['clasificacion']);
		$tramo->setCuerpo($_REQUEST['cuerpo']);
		$tramo->setCarril($_REQUEST['carril']);
		$tramo->setSentido($_REQUEST['sentido']);
		$tramo->setMInicio($minicial);
		$tramo->setMFin($mfin);
		$tramo->setLatInicio($get_sheetData[2]['A']);
		$tramo->setLongInicio($get_sheetData[2]['B']);
		$tramo->setLatFin($get_sheetData[$filas]['A']);
		$tramo->setLongFin($get_sheetData[$filas]['B']);
		$tramo->setLongitud($long);
		$tramo->setUsuarioId($_SESSION['usuario']);
		$this->tramo_model->insertar($tramo);
		if(!file_exists("img/img/".$clave)){
		mkdir("img/img/".$clave, 0700);
		mkdir("img/img/".$clave."/izqS1", 0700);
		mkdir("img/img/".$clave."/cenS1", 0700);
		mkdir("img/img/".$clave."/derS1", 0700);
		mkdir("img/img/".$clave."/trasS1", 0700);
		mkdir("img/img/".$clave."/izqS2", 0700);
		mkdir("img/img/".$clave."/cenS2", 0700);
		mkdir("img/img/".$clave."/derS2", 0700);
		mkdir("img/img/".$clave."/trasS2", 0700);
		mkdir("img/img/".$clave."/360", 0700);
		mkdir("img/img/".$clave."/360/1", 0700);
		mkdir("img/img/".$clave."/360/2", 0700);
		}
		$id=$this->tramo_model->getMaxId();
		$this->tramo_model->insertarDetalles($id,$get_sheetData);
		$_SESSION['agregado']="exito";
		redirect('panel/tramos', 'refresh');


	}

	public function carpetas()
	{
		$tramos=$this->tramo_model->getAll();
		foreach($tramos as $valor){
			if(!file_exists("img/img/".$valor->clave_tramo)){
		mkdir("img/img/".$valor->clave_tramo, 0700);
		mkdir("img/img/".$valor->clave_tramo."/izqS1", 0700);
		mkdir("img/img/".$valor->clave_tramo."/cenS1", 0700);
		mkdir("img/img/".$valor->clave_tramo."/derS1", 0700);
		mkdir("img/img/".$valor->clave_tramo."/trasS1", 0700);
		mkdir("img/img/".$valor->clave_tramo."/izqS2", 0700);
		mkdir("img/img/".$valor->clave_tramo."/cenS2", 0700);
		mkdir("img/img/".$valor->clave_tramo."/derS2", 0700);
		mkdir("img/img/".$valor->clave_tramo."/trasS2", 0700);
		mkdir("img/img/".$valor->clave_tramo."/360", 0700);
		mkdir("img/img/".$valor->clave_tramo."/360/1", 0700);
		mkdir("img/img/".$valor->clave_tramo."/360/2", 0700);
		}

		}


	}


	public function json()
	{
		$id=$_GET['id'];
		$json=json_encode($this->tramo_model->getJson($id));
		$this->load->view('jsonTramo',compact('json'));
	}

	public function editar()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$id=$_GET['id'];
			$tramo=$this->tramo_model->getById($id);
			$clasificaciones=$this->catalogo_model->getItems(10);	
			$cuerpos=$this->catalogo_model->getItems(11);
			$this->load->view('header');
			$this->load->view('pantallaEditarTramo',compact('tramo','clasificaciones','cuerpos'));
			
			if($_SESSION['editado']=="exito"){

				$this->output->append_output("<script>
					$(document).ready(function() {
					swal({
	                title: \"Exito!\",
	                text: \"Tramo Editado Correctamente!\",
	                type: \"success\"
	            	});

	        		});
					</script>"
			);
				$_SESSION['editado']="no";		
			}
		}
	}

	public function actualizar()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$tramo= new Tramo_Model();
			$tramo->setId($_REQUEST['id']);
			$tramo->setCarretera($_REQUEST['carretera']);
			$tramo->setClaveTramo($_REQUEST['clave']);
			$tramo->setRuta($_REQUEST['ruta']);
			$tramo->setCiudadInicio($_REQUEST['origen']);
			$tramo->setCiudadFin($_REQUEST['destino']);
			$tramo->setClasificacion($_REQUEST['clasificacion']);
			$tramo->setCuerpo($_REQUEST['cuerpo']);
			$this->tramo_model->actualizar($tramo);
			$this->tramo_model->editarDir($_REQUEST['dir'],$_REQUEST['clave']);
			$_SESSION['editado']="exito";
		}
		redirect('tramo/editar?id='.$_REQUEST['id'], 'refresh');
		
	}

		public function editarDetalle()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$id=$_GET['id'];
			$detalle=$this->tramo_model->getDetalleTramoById($id);
			$this->load->view('head');
			$this->load->view('pantallaEditarDetalle',compact('id','detalle'));
			$this->load->view('footer');
			if($_SESSION['editado']=="exito"){

				$this->output->append_output("<script>
					$(document).ready(function() {
					swal({
	                title: \"Exito!\",
	                text: \"Kilometro Editado Correctamente!\",
	                type: \"success\"
	            	});

	        		});
					</script>"
			);
				$_SESSION['editado']="no";		
			}
		}
	}

	public function actualizarDetalle()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$id=$_REQUEST['id'];
			$cadca=$_REQUEST['cadca'];
			$cadgeo=$_REQUEST['cadgeo'];
			$this->tramo_model->actualizarDetalle($id,$cadca,$cadgeo);
			$_SESSION['editado']="exito";
		}
		redirect('tramo/editarDetalle?id='.$_REQUEST['id'], 'refresh');
		
	}

	public function eliminar()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$id=$_GET['id'];
			$carpeta=$this->tramo_model->getClave($id);
			$this->dispositivoSeguridad_model->eliminar($id);
			$this->dispositivoSeguridadDH_model->eliminar($id);
			$this->dispositivoSeguridadDV_model->eliminar($id);
			$this->dispositivoSeguridadML_model->eliminar($id);
			$this->dispositivoSeguridadSN_model->eliminar($id);
			$this->tramo_model->eliminarDetalles($id);
			$this->tramo_model->eliminarPermisos($id);
			$this->seccion_model->eliminarTramo($id);
			$this->tramo_model->eliminar($id);
			if(is_dir("img/img/".$carpeta)){
			$this->tramo_model->eliminarDir("img/img/".$carpeta);
			}
			$this->usuario_model->log("Elimino Tramo ".$carpeta);
			$_SESSION['eliminado']="exito";
		}
		redirect('panel/tramos', 'refresh');
	}

	public function trasera(){
		$this->tramo_model->crearTrasera("img");
	}



}

}else{
	class Tramo extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}