<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
date_default_timezone_set("America/Mexico_City");
ini_set('memory_limit', '-1'); 
if($_SESSION!=null)  {

class DispositivoSeguridad extends CI_Controller {


		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 


  }

	public function index()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){		
		$tramos=$this->tramo_model->getBySeccion();
		}else{
		$tramos=$this->tramo_model->getPermitidos();	
		}
		$this->load->view('head');
		$this->load->view('pantallaCatalogoTramosDispositivo',compact('tramos'));
		$this->load->view('footer');
		if($_SESSION['eliminado']=="exito"){
			$this->output->append_output("<script>
				$(document).ready(function() {
				swal({
                title: \"Exito!\",
                text: \"Elemento Eliminado Correctamente!\",
                type: \"success\"
            	});

        		});
				</script>"
		);
			$_SESSION['eliminado']="no";
		}
	}




	public function alta()
	{
		$this->load->view('head');
		$this->load->view('pantallaAltaTramo');
		$this->load->view('footer');
	}
	
	public function longitud(){
		$dispositivos=$this->dispositivoSeguridad_model->getDispositivos();
		foreach($dispositivos as $dispositivo){
			$longitud=$dispositivo->fin-$dispositivo->inicio;
			$this->dispositivoSeguridad_model->actualizarLong($dispositivo->id,$longitud);
		}
	}

	public function dispositivos()
	{
		$id=$_GET['id'];
		$fecha=$_SESSION['sc'];
		$kminicial=$this->tramo_model->getKmInicial($id);
		$clave=$this->tramo_model->getClave($id);
		$dispositivos=$this->dispositivoSeguridad_model->getDispositivosByTramo($id,$fecha);
		$this->load->view('head');
		$this->load->view('pantallaCatalogoDispositivosSeguridad',compact('kminicial','dispositivos','clave'));
		$this->load->view('footer');

	}

	public function dispositivosDH()
	{
		$id=$_GET['id'];
		$fecha=$_SESSION['sc'];
		$kminicial=$this->tramo_model->getKmInicial($id);
		$clave=$this->tramo_model->getClave($id);
		$dispositivos=$this->dispositivoSeguridadDH_model->getDispositivosByTramo($id,$fecha);
		$this->load->view('head');
		$this->load->view('pantallaCatalogoDH',compact('kminicial','dispositivos','clave'));
		$this->load->view('footer');

	}

		public function dispositivosDV()
	{
		$id=$_GET['id'];
		$fecha=$_SESSION['sc'];
		$kminicial=$this->tramo_model->getKmInicial($id);
		$clave=$this->tramo_model->getClave($id);
		$dispositivos=$this->dispositivoSeguridadDV_model->getDispositivosByTramo($id,$fecha);
		$this->load->view('head');
		$this->load->view('pantallaCatalogoDV',compact('kminicial','dispositivos','clave'));
		$this->load->view('footer');

	}

	public function dispositivosML()
	{
		$id=$_GET['id'];
		$fecha=$_SESSION['sc'];
		$kminicial=$this->tramo_model->getKmInicial($id);
		$clave=$this->tramo_model->getClave($id);
		$dispositivos=$this->dispositivoSeguridadML_model->getDispositivosByTramo($id,$fecha);
		$this->load->view('head');
		$this->load->view('pantallaCatalogoML',compact('kminicial','dispositivos','clave'));
		$this->load->view('footer');

	}

	public function dispositivosSN()
	{
		$id=$_GET['id'];
		$fecha=$_SESSION['sc'];
		$kminicial=$this->tramo_model->getKmInicial($id);
		$clave=$this->tramo_model->getClave($id);
		$dispositivos=$this->dispositivoSeguridadSN_model->getDispositivosByTramo($id,$fecha);
		$this->load->view('head');
		$this->load->view('pantallaCatalogoSN',compact('kminicial','dispositivos','clave'));
		$this->load->view('footer');

	}

	public function prueba()
	{

		$this->load->view('pantallaPopUpVerticales');


	}



	public function insertar(){
		$tramoinif=$this->input->post('tramoini');
		$tramofinalf=$this->input->post('tramofinal');
		$ubicacion=$this->input->post('ubicacion');
		$longitud=$this->input->post('longitud');
		$tdispositivo=$this->input->post('tdispositivo');
		$designacion=$this->input->post('designacion');
		$dsistema=$this->input->post('dsistema');
		$tposte=$this->input->post('tposte');
		$sepostes=$this->input->post('sepostes');
		$altdisp=$this->input->post('altdisp');
		$secinicio=$this->input->post('secinicio');
		$secfinal=$this->input->post('secfinal');
		$tbtrans=$this->input->post('tbtrans');
		$estfisicods=$this->input->post('estfisicods');
		$observacion=$this->input->post('observacion');
		$clave=$this->input->post('clave');
		$sentido=$this->input->post('sentidods');
		$fecha=$this->input->post('ano');
		$seccion=$this->input->post('seccion');
		$tramoini=$this->tramo_model->getDetalleTramoId($clave,$tramoinif,$sentido);
		$tramofinal=$this->tramo_model->getDetalleTramoId($clave,$tramofinalf,$sentido);		
		$dispositivo= new DispositivoSeguridad_Model();
		$dispositivo->setTramoInicial($tramoini);
		$dispositivo->setTramoFinal($tramofinal);
		$dispositivo->setLado($ubicacion);
        $dispositivo->setLongitud($longitud);
		$dispositivo->setTipoDispositivo($tdispositivo);
		$dispositivo->setDesignacion($designacion);
		$dispositivo->setDescSistema($dsistema);
		$dispositivo->setTipoPoste($tposte);
		$dispositivo->setSePostes($sepostes);
		$dispositivo->setAltDisp($altdisp);
		$dispositivo->setSecInicio($secinicio);
		$dispositivo->setSecFinal($secfinal);
		$dispositivo->setTbTrans($tbtrans);
		$dispositivo->setEstadoFisico($estfisicods);
		$dispositivo->setObservacion($observacion);
		$dispositivo->setFecha($fecha);
		$dispositivo->setSeccion($seccion);
		$dispositivo->setUsuarioId($_SESSION['usuario']);
		$this->dispositivoSeguridad_model->insertar($dispositivo);




	}



	public function insertarDH(){
		$tramoinif=$this->input->post('tramoini');
		$tramofinalf=$this->input->post('tramofinal');
		$nombremarca=$this->input->post('nombremarca');
		$clavemarca=$this->input->post('clavemarca');
		$colormarca=$this->input->post('colormarca');
		$anchomarca=$this->input->post('anchomarca');
		$reflejante=$this->input->post('reflejante');
		$botones=$this->input->post('botones');
		$longncumple=$this->input->post('longncumple');
		$longfalta=$this->input->post('longfalta');
		$obs=$this->input->post('obs');
		$accion=$this->input->post('accion');
		$clave=$this->input->post('clave');
		$sentido=$this->input->post('sentidods');
		$fecha=$this->input->post('ano');
		$seccion=$this->input->post('seccion');
		$tramoini=$this->tramo_model->getDetalleTramoId($clave,$tramoinif,$sentido);
		$tramofinal=$this->tramo_model->getDetalleTramoId($clave,$tramofinalf,$sentido);		
		$dispositivo= new DispositivoSeguridadDH_Model();
		$dispositivo->setTramoInicial($tramoini);
		$dispositivo->setTramoFinal($tramofinal);
		$dispositivo->setNombreMarca($nombremarca);
		$dispositivo->setClaveMarca($clavemarca);
		$dispositivo->setColorMarca($colormarca);
		$dispositivo->setAnchoMarca($anchomarca);
		$dispositivo->setReflejante($reflejante);
		$dispositivo->setBotones($botones);
		$dispositivo->setLongNCumple($longncumple);
		$dispositivo->setLongFalta($longfalta);
		$dispositivo->setObservacion($obs);
		$dispositivo->setAccion($accion);
		$dispositivo->setFecha($fecha);
		$dispositivo->setSeccion($seccion);
		$dispositivo->setUsuarioId($_SESSION['usuario']);
		$this->dispositivoSeguridadDH_model->insertar($dispositivo);

	}

	public function insertarDV(){
		$tramoinif=$this->input->post('tramoini');
		$nombredispositivo=$this->input->post('nombredispositivo');
		$longnorm=$this->input->post('longnorm');
		$ubicacion=$this->input->post('ubicacion');
		$colornorm=$this->input->post('colornorm');
		$clavedisp=$this->input->post('clavedispdv');
		$formnorm=$this->input->post('formnorm');
		$pictonorm=$this->input->post('pictonorm');
		$estfisico=$this->input->post('estfisico');
		$dimdis=$this->input->post('dimdis');
		$msjcong=$this->input->post('msjcong');
		$senalncumple=$this->input->post('senalncumple');
		$senalfalta=$this->input->post('senalfalta');		
		$longncumple=$this->input->post('longncumple');
		$longfalta=$this->input->post('longfalta');
		$obs=$this->input->post('obs');
		$accion=$this->input->post('accion');
		$sentido=$this->input->post('sentidods');
		$clave=$this->input->post('clave');
		$fecha=$this->input->post('ano');
		$seccion=$this->input->post('seccion');
		$tramoini=$this->tramo_model->getDetalleTramoId($clave,$tramoinif,$sentido);	
		$dispositivo= new DispositivoSeguridadDV_Model();
		$dispositivo->setTramoInicial($tramoini);
		$dispositivo->setSentido($sentido);
		$dispositivo->setNombreDispositivo($nombredispositivo);
		$dispositivo->setClave($clavedisp);
		$dispositivo->setLado($ubicacion);
		$dispositivo->setLongNorm($longnorm);
		$dispositivo->setColorNorm($colornorm);
		$dispositivo->setFormNorm($formnorm);
		$dispositivo->setPictoNorm($pictonorm);
		$dispositivo->setEstFisico($estfisico);
		$dispositivo->setDimDis($dimdis);
		$dispositivo->setMsjCong($msjcong);
		$dispositivo->setSenalNCumple($senalncumple);
		$dispositivo->setSenalFalta($senalfalta);
		$dispositivo->setLongNCumple($longncumple);
		$dispositivo->setLongFalta($longfalta);
		$dispositivo->setObservacion($obs);
		$dispositivo->setAccion($accion);
		$dispositivo->setFecha($fecha);
		$dispositivo->setSeccion($seccion);
		$dispositivo->setUsuarioId($_SESSION['usuario']);
		$this->dispositivoSeguridadDV_model->insertar($dispositivo);

	}

	public function insertarML(){
		$tramoinif=$this->input->post('tramoini');
		$tramofinalf=$this->input->post('tramofinal');
		$ubicacion=$this->input->post('ubicacion');
		$clave=$this->input->post('clave');
		$longitud=$this->input->post('longitud');
		$sentido=$this->input->post('sentidods');
		$fecha=$this->input->post('ano');
		$seccion=$this->input->post('seccion');
		$tramoini=$this->tramo_model->getDetalleTramoId($clave,$tramoinif,$sentido);
		$tramofinal=$this->tramo_model->getDetalleTramoId($clave,$tramofinalf,$sentido);		
		$dispositivo= new DispositivoSeguridadML_Model();
		$dispositivo->setTramoInicial($tramoini);
		$dispositivo->setTramoFinal($tramofinal);
		$dispositivo->setUbicacion($ubicacion);
		$dispositivo->setLongitud($longitud);
		$dispositivo->setFecha($fecha);
		$dispositivo->setSeccion($seccion);
		$dispositivo->setUsuarioId($_SESSION['usuario']);
		$this->dispositivoSeguridadML_model->insertar($dispositivo);

	}

	public function insertarSN(){
		$tramoinif=$this->input->post('tramoini');
		$ubicacion=$this->input->post('ubicacion');
		$clave=$this->input->post('clave');
		$nsenales=$this->input->post('nsenales');
		$sentido=$this->input->post('sentidods');
		$fecha=$this->input->post('ano');
		$seccion=$this->input->post('seccion');
		$tramoini=$this->tramo_model->getDetalleTramoId($clave,$tramoinif,$sentido);		
		$dispositivo= new DispositivoSeguridadSN_Model();
		$dispositivo->setTramoInicial($tramoini);
		$dispositivo->setUbicacion($ubicacion);
		$dispositivo->setNSenales($nsenales);
		$dispositivo->setFecha($fecha);
		$dispositivo->setSeccion($seccion);
		$dispositivo->setUsuarioId($_SESSION['usuario']);
		$this->dispositivoSeguridadSN_model->insertar($dispositivo);

	}


	public function json()
	{
		$json=json_encode($this->tramo_model->getJson());
		$this->load->view('jsonTramo',compact('json'));
	}
	
	//este la funcion en el controlador con el que se vaa generar el reporte texto, acerca de los dispositivos de seguridad , dispositivos horizontales, verticales, etc
	public function reporte()
	{
		
		$tramos=$this->tramo_model->getAll();//obtenemos la informacion de los tramos de la consulta getAll
		$this->load->view('head');
		$this->load->view('pantallaReporteTramos',compact('tramos'));
		$this->load->view('footer');
	}

	//esta funcion de controlador es para descargar los reportes fotograficos

	public function reporteImg()
	{
		
		$tramos=$this->tramo_model->getAll();
		$this->load->view('head');
		$this->load->view('pantallaReporteTramosImg',compact('tramos'));
		$this->load->view('footer');
	}


    //reportes en excel, checar
	public function reporteExcel()
	{
		

		$fecha=$_SESSION['sc'];
		$this->load->library('excel');
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load('excel/reporte.xlsx'); //en este documento se alamacenará la información
		
		$excel2->setActiveSheetIndex(0);
		
		$contador=2;//usaremos un contador
		
		if(isset($_POST['tramos'])){
			foreach ($_POST['tramos'] as $tramo)
			{
				$dispositivos=$this->dispositivoSeguridad_model->getDispositivosByTramo($tramo,$fecha);
				
	        	foreach($dispositivos as $valor){
					
	        		$izq="";
	        		$der="";
	        		$long=$valor->fin-$valor->inicio;
	        		if($valor->lado==2){
	        			$izq="✖";
	        			$der="✖";

	        		}else if($valor->lado==0)$izq="✖"; 

	        		else if($valor->lado==1)$der="✖"; 

	        	
	        		
	        		//esta pestaña es referente a la información de los dispositivos de seguridad, es la pestaña num 1
					$excel2->getActiveSheet()->setCellValue('A'.$contador, $valor->latini)
			    		->setCellValue('B'.$contador, $valor->longini)
			    		->setCellValue('C'.$contador, $valor->latfin)
			    		->setCellValue('D'.$contador, $valor->longfin)
			    		->setCellValue('E'.$contador, $valor->mtsini)
			    		->setCellValue('F'.$contador, $valor->mtsfin)
			    		->setCellValue('G'.$contador, $long)
			    		->setCellValue('H'.$contador, $izq)
			    		->setCellValue('I'.$contador, $der)
			    		->setCellValue('J'.$contador, $valor->dispositivo)
			    		->setCellValue('K'.$contador, $valor->designacion)
			    		->setCellValue('L'.$contador, $valor->desc_sistema)       
			    		->setCellValue('M'.$contador, $valor->tipo_poste)
			    		->setCellValue('N'.$contador, $valor->separacion_postes)
			    		->setCellValue('O'.$contador, $valor->altura_dispositivo)
			    		->setCellValue('P'.$contador, $valor->tsinicio)
			    		->setCellValue('Q'.$contador, $valor->tsfin)
			    		->setCellValue('R'.$contador, $valor->tbtransicion)
			    		->setCellValue('S'.$contador, $valor->estfisico)
			    		->setCellValue('T'.$contador, $valor->observaciones);
			    		$contador++;
			    	}
				
			}
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			//esta sera la pestaña activa para guardar información de dispositivos horizontales
			$excel2->setActiveSheetIndex(1);
			$contador=3;
			
			foreach ($_POST['tramos'] as $tramo)
			{
				$dispositivos=$this->dispositivoSeguridadDH_model->getDispositivosByTramo($tramo,$fecha);
				
	        	foreach($dispositivos as $valor){					
					
					
	        		$si="";
	        		$no="";
	        		if($valor->botones==0)$no="✖"; 
	        		else if($valor->botones==1)$si="✖"; 
	        		$marca="";
	        		if($valor->marca_reflejante==0)$marca="No"; 
	        		else if($valor->marca_reflejante==1)$marca="Si";

	        		
	        		
					$excel2->getActiveSheet()->setCellValue('A'.$contador, $valor->latini)
			    		->setCellValue('B'.$contador, $valor->longini)
			    		->setCellValue('C'.$contador, $valor->latfin)
			    		->setCellValue('D'.$contador, $valor->longfin)
			    		->setCellValue('E'.$contador, $valor->mtsini)
			    		->setCellValue('F'.$contador, $valor->mtsfin)
			    		->setCellValue('G'.$contador, $valor->nombremarca)
			    		->setCellValue('H'.$contador, $valor->clave_marca)
			    		->setCellValue('I'.$contador, $valor->colormarca)
			    		->setCellValue('J'.$contador, $valor->ancho_marca)
			    		->setCellValue('K'.$contador, $marca)
			    		->setCellValue('L'.$contador, $si)       
			    		->setCellValue('M'.$contador, $no)
			    		->setCellValue('N'.$contador, $valor->imagen)
			    		->setCellValue('O'.$contador, $valor->longncumple)
			    		->setCellValue('P'.$contador, $valor->longfalta)
			    		->setCellValue('Q'.$contador, $valor->obs)
			    		->setCellValue('R'.$contador, $valor->accion);
						$contador++;
						
			    	}
				
			}
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			///esta pestaña tiene información acerca de los dispositivos verticales
			$excel2->setActiveSheetIndex(2);
			$contador=3;
			foreach ($_POST['tramos'] as $tramo)
			{
	        	$dispositivos=$this->dispositivoSeguridadDV_model->getDispositivosByTramo($tramo,$fecha);
	        	foreach($dispositivos as $valor){
	        		$izq="";
	        		$der="";
	        		if($valor->lado==2){
	        			$izq="✖";
	        			$der="✖";

	        		}else if($valor->lado==0)$izq="✖"; 

	        		else if($valor->lado==1)$der="✖"; 

	        		$longsi="";
	        		$longno="";
	        		if($valor->longnorm==0)$longno="✖"; 
	        		else if($valor->longnorm==1)$longsi="✖"; 

	        		$colorsi="";
	        		$colorno="";
	        		if($valor->color_cumple==0)$colorno="✖"; 
	        		else if($valor->color_cumple==1)$colorsi="✖";

	        		$formasi="";
	        		$formano="";
	        		if($valor->forma_cumple==0)$formano="✖"; 
	        		else if($valor->forma_cumple==1)$formasi="✖";

	        		$pictosi="";
	        		$pictono="";
	        		if($valor->pictograma_cumple==0)$pictono="✖"; 
	        		else if($valor->pictograma_cumple==1)$pictosi="✖";

	        		$estsi="";
	        		$estno="";
	        		if($valor->estado_cumple==0)$estno="✖"; 
	        		else if($valor->estado_cumple==1)$estsi="✖";

	        		$dimsi="";
	        		$dimno="";
	        		if($valor->dimensiones_cumple==0)$dimno="✖"; 
	        		else if($valor->dimensiones_cumple==1)$dimsi="✖";

	        		$msjsi="";
	        		$msjno="";
	        		if($valor->mensaje_cumple==0)$msjno="✖"; 
	        		else if($valor->mensaje_cumple==1)$msjsi="✖";
	        		
	        		$cumplenorm="";
	        		if($valor->cumple_normativa==1) $cumplenorm="✖";

	        		$falta="";
	        		if($valor->falta==1) $falta="✖";
	        		
					$excel2->getActiveSheet()->setCellValue('A'.$contador, $valor->latini)
			    		->setCellValue('B'.$contador, $valor->longini)
			    		->setCellValue('C'.$contador, $valor->mtsini)
			    		->setCellValue('D'.$contador, $izq)
			    		->setCellValue('E'.$contador, $der)
			    		->setCellValue('F'.$contador, $valor->nombremarca)
			    		->setCellValue('G'.$contador, $valor->clave)
			    		->setCellValue('H'.$contador, $longsi)
			    		->setCellValue('I'.$contador, $longno)
			    		->setCellValue('J'.$contador, $colorsi)
			    		->setCellValue('K'.$contador, $colorno)
			    		->setCellValue('L'.$contador, $formasi)       
			    		->setCellValue('M'.$contador, $formano)
			    		->setCellValue('N'.$contador, $pictosi)
			    		->setCellValue('O'.$contador, $pictono)
			    		->setCellValue('P'.$contador, $estsi)
			    		->setCellValue('Q'.$contador, $estno)
			    		->setCellValue('R'.$contador, $dimsi)
			    		->setCellValue('S'.$contador, $dimno)
			    		->setCellValue('T'.$contador, $msjsi)
			    		->setCellValue('U'.$contador, $msjno)
			    		->setCellValue('V'.$contador, $valor->imagen)
			    		->setCellValue('W'.$contador, $cumplenorm)
			    		->setCellValue('X'.$contador, $falta)
			    		->setCellValue('Y'.$contador, $valor->longncumple)
			    		->setCellValue('Z'.$contador, $valor->longfalta)
			    		->setCellValue('AA'.$contador, $valor->obs)
			    		->setCellValue('AB'.$contador, $valor->accion);
			    		$contador++;
			    	}
				
			}
			$excel2->getActiveSheet()->getStyle('A2:AB'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:AB'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:AB'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			///Maleza
			$excel2->setActiveSheetIndex(3);
			$contador=3;
			foreach ($_POST['tramos'] as $tramo)
			{
	        	$dispositivos=$this->dispositivoSeguridadML_model->getDispositivosByTramo($tramo,$fecha);
	        	foreach($dispositivos as $valor){
	        		$izq="";
	        		$der="";
	        		$ambos="";
	        		if($valor->lado==2){
	        			$ambos="✖";

	        		}else if($valor->lado==0)$izq="✖"; 

	        		else if($valor->lado==1)$der="✖"; 
	        		
	        		
					$excel2->getActiveSheet()->setCellValue('A'.$contador, $valor->latini)
			    		->setCellValue('B'.$contador, $valor->longini)
			    		->setCellValue('C'.$contador, $valor->latfin)
			    		->setCellValue('D'.$contador, $valor->longfin)
			    		->setCellValue('E'.$contador, $valor->mtsini)
			    		->setCellValue('F'.$contador, $valor->mtsfin)
			    		->setCellValue('G'.$contador, $izq)
			    		->setCellValue('H'.$contador, $der)
			    		->setCellValue('I'.$contador, $ambos)
			    		->setCellValue('J'.$contador, $valor->longitud);
			    		$contador++;
			    	}
				
			}
			$excel2->getActiveSheet()->getStyle('A2:J'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:J'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:J'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			///pestaña que guardara información acerca de señales
			$excel2->setActiveSheetIndex(4);
			$contador=3;
			foreach ($_POST['tramos'] as $tramo)
			{
	        	$dispositivos=$this->dispositivoSeguridadSN_model->getDispositivosByTramo($tramo,$fecha);
	        	foreach($dispositivos as $valor){
	        		$izq="";
	        		$der="";
	        		$ambos="";
	        		if($valor->lado==2){
	        			$ambos="✖";

	        		}else if($valor->lado==0)$izq="✖"; 

	        		else if($valor->lado==1)$der="✖"; 
	        		
	        		
					$excel2->getActiveSheet()->setCellValue('A'.$contador, $valor->latini)
			    		->setCellValue('B'.$contador, $valor->longini)			    		
			    		->setCellValue('C'.$contador, $valor->mtsini)
			    		->setCellValue('D'.$contador, $izq)
			    		->setCellValue('E'.$contador, $der)
			    		->setCellValue('F'.$contador, $ambos)
			    		->setCellValue('G'.$contador, $valor->nsenales);
			    		$contador++;
			    	}
				
			}
			$excel2->getActiveSheet()->getStyle('A2:J'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:J'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:J'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel2->setActiveSheetIndex(0);

		}

		foreach($_POST['tramos'] as $tramo){
	     $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
         $nombre_carretera=$this->tramo_model->getCarreteraNom($tramo);
       	 $objWriter->save('reporte.xlsx');
       	 //$objWriter->save('php://output');
       	
		$this->load->helper('download');
		
        $image_name ='"'.$nombre_carretera.'".xlsx';
       
   

        $data = file_get_contents("reporte.xlsx"); // Read the file's contents

        force_download($image_name, $data);

		}
		
        
	}

	//reportes en excel con imagenes

	public function reporteExcelImg()
	{
		$fecha=$_SESSION['sc'];
		$this->load->library('excel');
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load('excel/FormatoImg.xlsx'); // Empty Sheet		

		
	
		if(isset($_POST['tramos'])){
			
			//esta pestaña tiene información acerca de señalamiento horizontal que en el indice viene señalado como 
			//en el indice  2 pestaña numero 3
			$excel2->setActiveSheetIndex(2);
			$contador=14;
			
			foreach ($_POST['tramos'] as $tramo)
			{
				$dispositivos=$this->dispositivoSeguridadDH_model->getDispositivosByTramo($tramo,$fecha);
				$clave=$this->dispositivoSeguridad_model->getClave($tramo);
				$sentido=$this->dispositivoSeguridad_model->getSentido($tramo);	
					
	        	foreach($dispositivos as $valor){	
									
					$si="";
	        		$no="";
	        		if($valor->botones==0)$no="✖"; 
	        		else if($valor->botones==1)$si="✖"; 
	        		$marca="";
	        		if($valor->marca_reflejante==0)$marca="No"; 
	        		else if($valor->marca_reflejante==1)$marca="Si";
	        		
	        		
					$excel2->getActiveSheet()
			    		->setCellValue('A'.$contador, $valor->mtsini)
			    		->setCellValue('B'.$contador, $valor->mtsfin)
			    		->setCellValue('C'.$contador, $valor->nombremarca)
			    		->setCellValue('D'.$contador, $valor->clave_marca)
			    		->setCellValue('E'.$contador, $valor->colormarca)
			    		->setCellValue('F'.$contador, $valor->ancho_marca)
			    		->setCellValue('G'.$contador, $marca)
			    		->setCellValue('H'.$contador, $si)       
			    		->setCellValue('I'.$contador, $no)
			    		->setCellValue('J'.$contador, $valor->imagen)
			    		->setCellValue('K'.$contador, $valor->longncumple)
			    		->setCellValue('L'.$contador, $valor->longfalta)
			    		->setCellValue('M'.$contador, $valor->obs)
			    		->setCellValue('N'.$contador, $valor->accion);
						$contador++;
						
					}
					/*esta parte es importante  pues aquí se evaluaran las fotografías en el archivo de excel, respecto a las fotogradías */

					$contadorimg=16;
					$col="B";
					foreach($dispositivos as $valor){
						//estamos activando la pestala numero 3 que contendra la información de las imagenes de disposivos horzintales
						$excel2->setActiveSheetIndex(3);
						//se activa la pestaña evaluando la celdas que iran acomodando las fotografías, acomodando el numero de la fotografía, imagen
						$excel2->getActiveSheet()
			    		->setCellValue($col.($contadorimg+18), "Foto No. ".$valor->imagen);
						$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
						$objDrawing->setWorksheet($excel2->getActiveSheet());	
						$img="img/".$clave."/CenS".$sentido."/".$valor->imagen;
						if(file_exists($img)){
							$gdImage = imagecreatefromjpeg($img);
							$objDrawing->setName('test_img'.$contador);
							$objDrawing->setDescription('test_img'.$contador);
							$objDrawing->setImageResource($gdImage);
							$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
							$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
							$objDrawing->setResizeProportional(true);

							//$objDrawing->setHeight(500);
							  $objDrawing->setWidthAndHeight(498,300);
							$objDrawing->setCoordinates($col.$contadorimg);
						}
						
						if($col=="B"){
							$col="Q";
						}else{
							$col="B";
							$contadorimg+=21;
						}
					}	
					
					
				
			}
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:T'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			///en la pestaña numero 1, corriespondiente al indice numero 0 del arreglo
			//se guardara la información de señalamiento vertical.
			$excel2->setActiveSheetIndex(0);
			$contador=14;
			foreach ($_POST['tramos'] as $tramo)
			{
				$dispositivos=$this->dispositivoSeguridadDV_model->getDispositivosByTramo($tramo,$fecha);
				$clave=$this->dispositivoSeguridad_model->getClave($tramo);
				$sentido=$this->dispositivoSeguridad_model->getSentido($tramo);	
	        	foreach($dispositivos as $valor){
	        		$izq="";
	        		$der="";
	        		if($valor->lado==2){
	        			$izq="✖";
	        			$der="✖";

	        		}else if($valor->lado==0)$izq="✖"; 

	        		else if($valor->lado==1)$der="✖"; 

	        		$longsi="";
	        		$longno="";
	        		if($valor->longnorm==0)$longno="✖"; 
	        		else if($valor->longnorm==1)$longsi="✖"; 

	        		$colorsi="";
	        		$colorno="";
	        		if($valor->color_cumple==0)$colorno="✖"; 
	        		else if($valor->color_cumple==1)$colorsi="✖";

	        		$formasi="";
	        		$formano="";
	        		if($valor->forma_cumple==0)$formano="✖"; 
	        		else if($valor->forma_cumple==1)$formasi="✖";

	        		$pictosi="";
	        		$pictono="";
	        		if($valor->pictograma_cumple==0)$pictono="✖"; 
	        		else if($valor->pictograma_cumple==1)$pictosi="✖";

	        		$estsi="";
	        		$estno="";
	        		if($valor->estado_cumple==0)$estno="✖"; 
	        		else if($valor->estado_cumple==1)$estsi="✖";

	        		$dimsi="";
	        		$dimno="";
	        		if($valor->dimensiones_cumple==0)$dimno="✖"; 
	        		else if($valor->dimensiones_cumple==1)$dimsi="✖";

	        		$msjsi="";
	        		$msjno="";
	        		if($valor->mensaje_cumple==0)$msjno="✖"; 
	        		else if($valor->mensaje_cumple==1)$msjsi="✖";
	        		
	        		$cumplenorm="";
	        		if($valor->cumple_normativa==1) $cumplenorm="✖";

	        		$falta="";
	        		if($valor->falta==1) $falta="✖";
	        		
					$excel2->getActiveSheet()			    		
						->setCellValue('A'.$contador, $valor->mtsini)
						->setCellValue('B'.$contador, $sentido)
			    		->setCellValue('C'.$contador, $valor->nombremarca)
			    		->setCellValue('D'.$contador, $valor->clave)
			    		->setCellValue('E'.$contador, $longsi)
			    		->setCellValue('F'.$contador, $longno)
			    		->setCellValue('G'.$contador, $colorsi)
			    		->setCellValue('H'.$contador, $colorno)
			    		->setCellValue('I'.$contador, $formasi)       
			    		->setCellValue('J'.$contador, $formano)
			    		->setCellValue('K'.$contador, $pictosi)
			    		->setCellValue('L'.$contador, $pictono)
			    		->setCellValue('M'.$contador, $estsi)
			    		->setCellValue('N'.$contador, $estno)
			    		->setCellValue('O'.$contador, $dimsi)
			    		->setCellValue('P'.$contador, $dimno)
			    		->setCellValue('Q'.$contador, $msjsi)
			    		->setCellValue('R'.$contador, $msjno)
			    		->setCellValue('S'.$contador, $valor->imagen)
			    		->setCellValue('T'.$contador, $cumplenorm)
			    		->setCellValue('U'.$contador, $falta)
			    		->setCellValue('V'.$contador, $valor->longncumple)
			    		->setCellValue('W'.$contador, $valor->longfalta)
			    		->setCellValue('X'.$contador, $valor->obs)
			    		->setCellValue('Y'.$contador, $valor->accion);
			    		$contador++;
					}
					
					//contadorimg=16
					$contadorimg=13;
					$col="B";
					foreach($dispositivos as $valor){
						$excel2->setActiveSheetIndex(1);
						$excel2->getActiveSheet()
						//recordemos que el contador img,anteriormente era $contadorImg+18
			    		->setCellValue($col.($contadorimg+21), "Foto No. ".$valor->imagen);
						$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
						$objDrawing->setWorksheet($excel2->getActiveSheet());							
						$img="img/".$clave."/DerS".$sentido."/".$valor->imagen;
						if(file_exists($img)){
							$gdImage = imagecreatefromjpeg($img);
							$objDrawing->setName('test_img'.$contador);
							$objDrawing->setDescription('test_img'.$contador);
							$objDrawing->setImageResource($gdImage);
							$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
							$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
							$objDrawing->setResizeProportional(true);
							//$objDrawing->setHeight(500);
                            $objDrawing->setWidthAndHeight(498,300);
							//$objDrawing->setWidth();
							$objDrawing->setCoordinates($col.$contadorimg);
						}
						
						
						if($col=="B"){
							$col="Q";
						}else{
							$col="B";
							$contadorimg+=21;
						}
					}	
				
			}
			$excel2->getActiveSheet()->getStyle('A2:AB'.$contador)->getAlignment()->setWrapText(true);
			$excel2->getActiveSheet()->getStyle('A2:AB'.$contador)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excel2->getActiveSheet()->getStyle('A2:AB'.$contador)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			

		}

		

        
        
        
       
       
   
       foreach($_POST['tramos'] as $tramo){
     
       
       	 $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
         $nombre_carretera=$this->tramo_model->getCarreteraNom($tramo);
       	 $objWriter->save('reporte.xlsx');
       	 //$objWriter->save('php://output');
       	
		$this->load->helper('download');
		
        $image_name ='"'.$nombre_carretera.'".xlsx';
       
   

        $data = file_get_contents("reporte.xlsx"); // Read the file's contents

        force_download($image_name, $data);

        

       }
       
      
		

        
        


	    
		


		
		
        
	}

	public function editar()
	{
		$id=$_GET['id'];
		$dispositivo=$this->dispositivoSeguridad_model->getById($id);
		foreach($dispositivo as $valor){
		$kminicial=$this->tramo_model->getCadCar($valor->detalle_tramo_inicial);
		$kmfinal=$this->tramo_model->getCadCar($valor->detalle_tramo_final);
		}
		$dispositivos=$this->catalogo_model->getItems(1);
		$designacion=$this->catalogo_model->getItems(2);
		$sistemas=$this->catalogo_model->getItems(3);
		$postes=$this->catalogo_model->getItems(4);
		$secextremas=$this->catalogo_model->getItems(5);
		$bartransicion=$this->catalogo_model->getItems(6);
		$estfisico=$this->catalogo_model->getItems(12);
		$this->load->view('head');
		$this->load->view('pantallaEditarDispositivoSeguridad',compact('dispositivo','dispositivos','designacion','sistemas','postes','secextremas','bartransicion','estfisico','kminicial','kmfinal'));
		$this->load->view('footer');
		if($_SESSION['editado']=="exito"){

				$this->output->append_output("<script>
					$(document).ready(function() {
					swal({
	                title: \"Exito!\",
	                text: \"Dispositivo Editado Correctamente!\",
	                type: \"success\"
	            	});

	        		});
					</script>"
			);
				$_SESSION['editado']="no";		
			}
	}

	

	public function actualizar(){
		$dispositivo= new DispositivoSeguridad_Model();
		$dispositivo->setId($_REQUEST['id']);
		$dispositivo->setLado($_REQUEST['radio']);
		$dispositivo->setTipoDispositivo($_REQUEST['dispositivos']);
		$dispositivo->setDesignacion($_REQUEST['designacion']);
		$dispositivo->setDescSistema($_REQUEST['dsistema']);
		$dispositivo->setTipoPoste($_REQUEST['tposte']);
		$dispositivo->setSePostes($_REQUEST['sepostes']);
		$dispositivo->setAltDisp($_REQUEST['altdisp']);
		$dispositivo->setSecInicio($_REQUEST['secinicio']);
		$dispositivo->setSecFinal($_REQUEST['secfinal']);
		$dispositivo->setTbTrans($_REQUEST['tbtrans']);
		$dispositivo->setEstadoFisico($_REQUEST['estfisicods']);
		$dispositivo->setObservacion($_REQUEST['obs']);
		$this->dispositivoSeguridad_model->actualizar($dispositivo);
		$this->usuario_model->log("Editado Dispositivo Seguridad ID:".$_REQUEST['id']);
		$_SESSION['editado']="exito";
		redirect('dispositivoSeguridad/editar?id='.$_REQUEST['id'], 'refresh');

	}

	public function editarDH()
	{
		$id=$_GET['id'];
		$dispositivo=$this->dispositivoSeguridadDH_model->getById($id);
		foreach($dispositivo as $valor){
		$kminicial=$this->tramo_model->getCadCar($valor->detalle_tramo_inicial);
		$kmfinal=$this->tramo_model->getCadCar($valor->detalle_tramo_final);
		}
		$nombremarcas=$this->catalogo_model->getItemsClave(7);
		$coloresmarca=$this->catalogo_model->getItems(8);
		$this->load->view('head');
		$this->load->view('pantallaEditarDH',compact('dispositivo','nombremarcas','coloresmarca','kminicial','kmfinal'));
		$this->load->view('footer');
		if($_SESSION['editado']=="exito"){

				$this->output->append_output("<script>
					$(document).ready(function() {
					swal({
	                title: \"Exito!\",
	                text: \"Señalamiento Horizontal Editado Correctamente!\",
	                type: \"success\"
	            	});

	        		});
					</script>"
			);
				$_SESSION['editado']="no";		
			}
	}

	public function actualizarDH(){
		$dispositivo= new DispositivoSeguridadDH_Model();
		$dispositivo->setId($_REQUEST['id']);
		$dispositivo->setNombreMarca($_REQUEST['nombremarcadh']);
		$dispositivo->setClaveMarca($_REQUEST['clavemarcadh']);
		$dispositivo->setColorMarca($_REQUEST['colormarcadh']);
		$dispositivo->setAnchoMarca($_REQUEST['anchomarcadh']);
		$dispositivo->setReflejante($_REQUEST['radioref']);
		$dispositivo->setBotones($_REQUEST['radio']);
		$dispositivo->setLongNCumple($_REQUEST['longncumpledh']);
		$dispositivo->setLongFalta($_REQUEST['longfaltadh']);
		$dispositivo->setObservacion($_REQUEST['obsdh']);
		$dispositivo->setAccion($_REQUEST['acciondh']);
		$this->dispositivoSeguridadDH_model->actualizar($dispositivo);
		$this->usuario_model->log("Editado Señalamiento Horizontal ID:".$_REQUEST['id']);
		$_SESSION['editado']="exito";
		redirect('dispositivoSeguridad/editarDH?id='.$_REQUEST['id'], 'refresh');

	}

	public function editarDV()
	{
		$id=$_GET['id'];
		$dispositivo=$this->dispositivoSeguridadDV_model->getById($id);
		foreach($dispositivo as $valor){
		$kminicial=$this->tramo_model->getCadCar($valor->detalle_tramo_inicial);
		}
		$preventivas=$this->catalogo_model->getItemsCat(9,1);
		$restrictivas=$this->catalogo_model->getItemsCat(9,2);
		$indetificacion=$this->catalogo_model->getItemsCat(9,3);
		$destino=$this->catalogo_model->getItemsCat(9,4);
		$recomendacion=$this->catalogo_model->getItemsCat(9,5);
		$general=$this->catalogo_model->getItemsCat(9,6);
		$servicios=$this->catalogo_model->getItemsCat(9,7);
		$turisticas=$this->catalogo_model->getItemsCat(9,8);
		$pendiente=$this->catalogo_model->getItemsCat(9,9);
		$this->load->view('head');
		$this->load->view('pantallaEditarDV',compact('dispositivo','preventivas','restrictivas','indetificacion','destino','recomendacion','general','servicios','turisticas','pendiente','kminicial'));
		$this->load->view('footer');
		if($_SESSION['editado']=="exito"){

				$this->output->append_output("<script>
					$(document).ready(function() {
					swal({
	                title: \"Exito!\",
	                text: \"Señalamiento Vertical Editado Correctamente!\",
	                type: \"success\"
	            	});

	        		});
					</script>"
			);
				$_SESSION['editado']="no";		
			}
	}

	public function actualizarDV(){
		$dispositivo= new DispositivoSeguridadDV_Model();
		$dispositivo->setId($_REQUEST['id']);
		$dispositivo->setNombreDispositivo($_REQUEST['nombredispositivodv']);
		$dispositivo->setClave($_REQUEST['clavedispositivodv']);
		$dispositivo->setLado($_REQUEST['radio']);
		$dispositivo->setLongNorm($_REQUEST['radiolongnorm']);
		$dispositivo->setColorNorm($_REQUEST['radiocolornorm']);
		$dispositivo->setFormNorm($_REQUEST['radioformnorm']);
		$dispositivo->setPictoNorm($_REQUEST['radiopictonorm']);
		$dispositivo->setEstFisico($_REQUEST['radioestfis']);
		$dispositivo->setDimDis($_REQUEST['radiodimdis']);
		$dispositivo->setMsjCong($_REQUEST['radiomsjcong']);
		$caracdv=$_REQUEST['radioscaracdv'];
		$senalncumple="";
		$senalfalta="";
		if($caracdv!=null){
                if($caracdv==0){
                    $senalncumple=1;
                    $senalfalta=0;
                }else{
                    $senalncumple=0;
                    $senalfalta=1;
                }
            }else{
                $senalncumple=-1;
                $senalfalta=-1;
            }
		$dispositivo->setSenalNCumple($senalncumple);
		$dispositivo->setSenalFalta($senalfalta);
		$dispositivo->setLongNCumple($_REQUEST['longncumpledv']);
		$dispositivo->setLongFalta($_REQUEST['longfaltadv']);
		$dispositivo->setObservacion($_REQUEST['obsdv']);
		$dispositivo->setAccion($_REQUEST['acciondv']);
		$this->dispositivoSeguridadDV_model->actualizar($dispositivo);
		$this->usuario_model->log("Editado Señalamiento Vertical ID:".$_REQUEST['id']);
		$_SESSION['editado']="exito";
		redirect('dispositivoSeguridad/editarDV?id='.$_REQUEST['id'], 'refresh');

	}

	public function eliminarDS()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$id=$_GET['id'];
		$this->dispositivoSeguridad_model->eliminarById($id);
		$this->usuario_model->log("Elimino Dispositivo de Seguridad");
		$_SESSION['eliminado']="exito";
		}
		redirect('dispositivoSeguridad', 'refresh');
	}

	public function eliminarDH()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$id=$_GET['id'];
		$this->dispositivoSeguridadDH_model->eliminarById($id);
		$this->usuario_model->log("Elimino Señalamiento Horizontal");
		$_SESSION['eliminado']="exito";
		}
		redirect('dispositivoSeguridad', 'refresh');
	}

	public function eliminarDV()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$id=$_GET['id'];
		$this->dispositivoSeguridadDV_model->eliminarById($id);
		$this->usuario_model->log("Elimino Señalamiento Vertical");
		$_SESSION['eliminado']="exito";
		}
		redirect('dispositivoSeguridad', 'refresh');
	}

	public function eliminarML()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$id=$_GET['id'];
		$this->dispositivoSeguridadML_model->eliminarById($id);
		$this->usuario_model->log("Elimino Tramo con Maleza");
		$_SESSION['eliminado']="exito";
		}
		redirect('dispositivoSeguridad', 'refresh');
	}

	public function eliminarSN()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$id=$_GET['id'];
		$this->dispositivoSeguridadSN_model->eliminarById($id);
		$this->usuario_model->log("Elimino Contar Señales");
		$_SESSION['eliminado']="exito";
		}
		redirect('dispositivoSeguridad', 'refresh');
	}



}

}else{
	class DispositivoSeguridad extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}
