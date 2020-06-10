<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
session_start();

if($_SESSION!=null)  {

class Auscultacion extends CI_Controller {


		 function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
     $this->load->helper('url'); 
     

  }

	public function index()
	{
		
		redirect('pagenotfound','refresh');

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
		}
	}

	public function alta()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
		$id=$_GET['id'];
		$this->load->view('header');
		$this->load->view('pantallaAltaInformacion',compact('id'));

		}else{
			redirect('pagenotfound','refresh');
		}
	}

	public function json()
	{
		$id=$_GET['id'];
		$tipo=$_GET['tipo'];
		if($tipo==1){
			$json=json_encode($this->auscultacion_model->getJson($id));
		}else if($tipo==2){
			$json=json_encode($this->auscultacion_model->getJsonc($id));
		}else if($tipo==3){
			$json=json_encode($this->auscultacion_model->getJsonkm($id));
		}else if($tipo==4){
			$json=json_encode($this->auscultacion_model->getJsonckm($id));
		}
		
		$this->load->view('jsonTramo',compact('json'));
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
		$this->load->view('pantallaAltaDispositivos',compact('clave','minicio','dispositivos','designacion','sistemas','postes','secextremas','bartransicion','estfisico','coloresmarca','nombremarcas','preventivas','restrictivas','identificacion','destino','recomendacion','general','servicios','turisticas','pendiente','sentido','id','usuario'));
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




	public function subir(){

		$storagename = "excel/ausc.xlsx";
		if (file_exists($_FILES["file"]["name"])) { unlink($_FILES["file"]["name"]); }
		move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);
		$this->load->library('excel');
        $objPHPExcel = PHPExcel_IOFactory::load('excel/ausc.xlsx');
        $filas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        $objPHPExcel->getActiveSheet()->getStyle('E2:G'.$filas)->getNumberFormat()->setFormatCode('0000000000');
        $get_sheetData = "";
        $sheet = $objPHPExcel->getSheet(0);
        $get_sheetData=$sheet->toArray(null,true,true,true);	
		$cont=1;
        $detalles=array();
        foreach ($get_sheetData as $row) {
            if($cont!=1){
            $array= array("iriprom" => $row['A'],"prmax" =>$row['B'],"mac_prom" =>$row['C'],"cadenamiento" =>$row['D']);
            $detalles[]=$array;
            }
            $cont++;
        } 
        $long = $cont;
		//100m
        $cont=0;
		$iri=0;
		$max=0;
		$mac=0;
		$arraydatos=array();
		foreach ($detalles as $valor) {
            $iri+=$valor['iriprom'];
            $max+=$valor['prmax'];
            $mac+=$valor['mac_prom'];
            $cont++;
            if($cont==5){
            	$i=0;
				$iri=$iri/5;
				$max=$max/5;
				$mac=$mac/5;
            	while($i<5){
            		$array=array("iriprom" => $iri,"prmax" =>$max,"mac_prom" =>$mac);
            		$arraydatos[]=$array;
            		$i++;
            	}
            	$cont=0;
				$iri=0;
				$max=0;
				$mac=0;
            }

        }
        $contador=2;
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load('excel/ausc.xlsx'); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		$excel2->getActiveSheet()->setCellValue('D1','iri_prom 100m');
		$excel2->getActiveSheet()->setCellValue('E1','Calificacion');
		$excel2->getActiveSheet()->setCellValue('J1','pr_max 100m');
		$excel2->getActiveSheet()->setCellValue('K1','Calificacion');
		$excel2->getActiveSheet()->setCellValue('P1','mac_prom 100m');
		$excel2->getActiveSheet()->setCellValue('Q1','Calificacion');
		foreach ($arraydatos as $valor){	
				if($valor['iriprom']<=3){
					$estado='Bueno';
					$color='009900';
				}else if($valor['iriprom']<=4.5){
					$estado='Regular';
					$color='FFFF33';
				}else{
					$estado='Malo';
					$color='FF0000';
				}

				if($valor['prmax']<=7){
					$estadomax='Bueno';
					$colormax='009900';
				}else if($valor['prmax']<=9){
					$estadomax='Regular';
					$colormax='FFFF33';
				}else{
					$estadomax='Malo';
					$colormax='FF0000';
				}

				$excel2->getActiveSheet()->setCellValue('D'.$contador, $valor['iriprom'])
				->setCellValue('E'.$contador, $estado)			
    		->setCellValue('J'.$contador, $valor['prmax'])
    		->setCellValue('K'.$contador, $estadomax)
    		->setCellValue('P'.$contador, $valor['mac_prom']);
    		
    		$excel2->getActiveSheet()
        ->getStyle('E'.$contador)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB($color);

        $excel2->getActiveSheet()
        ->getStyle('K'.$contador)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB($colormax);
    		$contador++;
		}
			
		//1km

        $cont=0;
		$iri=0;
		$max=0;
		$mac=0;
		$arraydatos=array();
		foreach ($detalles as $valor) {
            $iri+=$valor['iriprom'];
            $max+=$valor['prmax'];
            $mac+=$valor['mac_prom'];
            $cont++;
            if($cont==50){
            	$i=0;
				$iri=$iri/50;
				$max=$max/50;
				$mac=$mac/50;
            	while($i<50){
            		$array=array("iriprom" => $iri,"prmax" =>$max,"mac_prom" =>$mac);
            		$arraydatos[]=$array;
            		$i++;
            	}
            	$cont=0;
				$iri=0;
				$max=0;
				$mac=0;
            }

        }
        $contador=2;
		
		$excel2->getActiveSheet()->setCellValue('F1','iri_prom 1km');
		$excel2->getActiveSheet()->setCellValue('G1','Calificacion');
		$excel2->getActiveSheet()->setCellValue('L1','pr_max 1km');
		$excel2->getActiveSheet()->setCellValue('M1','Calificacion');
		$excel2->getActiveSheet()->setCellValue('R1','mac_prom 1km');
		$excel2->getActiveSheet()->setCellValue('S1','Calificacion');
		foreach ($arraydatos as $valor){	
					
				if($valor['iriprom']<=3){
					$estado='Bueno';
					$color='009900';
				}else if($valor['iriprom']<=4.5){
					$estado='Regular';
					$color='FFFF33';
				}else{
					$estado='Malo';
					$color='FF0000';
				}

				if($valor['prmax']<=7){
					$estadomax='Bueno';
					$colormax='009900';
				}else if($valor['prmax']<=9){
					$estadomax='Regular';
					$colormax='FFFF33';
				}else{
					$estadomax='Malo';
					$colormax='FF0000';
				}



				$excel2->getActiveSheet()->setCellValue('F'.$contador, $valor['iriprom'])
				->setCellValue('G'.$contador, $estado)
    		->setCellValue('L'.$contador, $valor['prmax'])
    		->setCellValue('M'.$contador, $estadomax)
    		->setCellValue('R'.$contador, $valor['mac_prom']);
    	$excel2->getActiveSheet()
        ->getStyle('G'.$contador)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB($color);
    		
		

		$excel2->getActiveSheet()
        ->getStyle('M'.$contador)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB($colormax);
		$contador++;
		}

		//5km

        $cont=0;
		$iri=0;
		$max=0;
		$mac=0;
		$arraydatos=array();
		foreach ($detalles as $valor) {
            $iri+=$valor['iriprom'];
            $max+=$valor['prmax'];
            $mac+=$valor['mac_prom'];
            $cont++;
            if($cont==250){
            	$i=0;
				$iri=$iri/250;
				$max=$max/250;
				$mac=$mac/250;
            	while($i<250){
            		$array=array("iriprom" => $iri,"prmax" =>$max,"mac_prom" =>$mac);
            		$arraydatos[]=$array;
            		$i++;
            	}
            	$cont=0;
				$iri=0;
				$max=0;
				$mac=0;
            }

        }
        $contador=2;
		
		$excel2->getActiveSheet()->setCellValue('H1','iri_prom 5km');
		$excel2->getActiveSheet()->setCellValue('I1','Calificacion');
		$excel2->getActiveSheet()->setCellValue('N1','pr_max 5km');
		$excel2->getActiveSheet()->setCellValue('O1','Calificacion');
		$excel2->getActiveSheet()->setCellValue('T1','mac_prom 5km');
		$excel2->getActiveSheet()->setCellValue('U1','Calificacion');
		foreach ($arraydatos as $valor){	
				if($valor['iriprom']<=3){
					$estado='Bueno';
					$color='009900';
				}else if($valor['iriprom']<=4.5){
					$estado='Regular';
					$color='FFFF33';
				}else{
					$estado='Malo';
					$color='FF0000';
				}

				if($valor['prmax']<=7){
					$estadomax='Bueno';
					$colormax='009900';
				}else if($valor['prmax']<=9){
					$estadomax='Regular';
					$colormax='FFFF33';
				}else{
					$estadomax='Malo';
					$colormax='FF0000';
				}

				$excel2->getActiveSheet()->setCellValue('H'.$contador, $valor['iriprom'])
				->setCellValue('I'.$contador, $estado)
    		->setCellValue('N'.$contador, $valor['prmax'])
    		->setCellValue('O'.$contador, $estadomax)
    		->setCellValue('T'.$contador, $valor['mac_prom']);
    		$excel2->getActiveSheet()
        ->getStyle('I'.$contador)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB($color);

        $excel2->getActiveSheet()
        ->getStyle('O'.$contador)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB($colormax);
    		$contador++;
		}
    	


		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('reporteausc.xlsx');

		$this->load->helper('download');
        $image_name = "Reporte_Ausc.xlsx";
        $data = file_get_contents("reporteausc.xlsx"); // Read the file's contents

        force_download($image_name, $data);


	}


	public function subirInformacion()
	{
		$tipo=$_POST["radio"];
		$tramo=$_REQUEST['id'];
                $iribox= isset($_POST['iri']) && $_POST['iri']  ? "1" : "0";
		$maxbox= isset($_POST['max']) && $_POST['max']  ? "1" : "0";
		$macbox= isset($_POST['mac']) && $_POST['mac']  ? "1" : "0";
		$fricbox= isset($_POST['fric']) && $_POST['fric']  ? "1" : "0";
		$defbox= isset($_POST['def']) && $_POST['def']  ? "1" : "0";
		$detbox= isset($_POST['det']) && $_POST['det']  ? "1" : "0";
		$storagename = "excel/ausc.xlsx";
		if (file_exists($_FILES["file"]["name"])) { unlink($_FILES["file"]["name"]); }
		move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);
		$this->load->library('excel');
        $objPHPExcel = PHPExcel_IOFactory::load('excel/ausc.xlsx');
        $filas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();       
        $get_sheetData = "";
        $sheet = $objPHPExcel->getSheet(0);
        $get_sheetData=$sheet->toArray(null,true,true,true);	
		$cont=1;
        $detalles=array();
        foreach ($get_sheetData as $row) {
            if($cont!=1){
            $array= array("iriprom" => $row['A'],"prmax" =>$row['B'],"mac_prom" =>$row['C'],"fric" =>$row['D'],"def" =>$row['E'],"det" =>$row['F']);
            $detalles[]=$array;
            }
            $cont++;
        }


		$arraydatos=array();

//iri
if($iribox==1){ 

		if($tipo==0){
			$i=0;
			  
				foreach ($detalles as $valor) {	
				           		
		            		$array=array("iri_v" => $valor['iriprom']);
		            		$arrayiriv[]=$array;
		            		$i++;
		        
	        }
        }

		//100m a 20m
		 else if($tipo==1){ 
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<5){
	            		$array=array("iri_v" => $valor['iriprom']);
	            		$arrayiriv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //500m a 20m
         else if($tipo==2){
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<25){
	            		$array=array("iri_v" => $valor['iriprom']);
	            		$arrayiriv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //1km a 20
         else if($tipo==3){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<50){
	            		$array=array("iri_v" => $valor['iriprom']);
	            		$arrayiriv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

        //5km a 20
         else if($tipo==4){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<250){
	            		$array=array("iri_v" => $valor['iriprom']);
	            		$arrayiriv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

}
///CONVERSIONES MAX**********
if($maxbox==1){ 

        	if($tipo==0){
			$i=0;
			  
				foreach ($detalles as $valor) {	
				           		
		            		$array=array("max_v" => $valor['prmax']);
		            		$arraymaxv[]=$array;
		            		$i++;
		        
	        }
        }

		//100m a 20m
		 else if($tipo==1){   
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<5){
	            		$array=array("max_v" => $valor['prmax']);
	            		$arraymaxv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //500m a 20m
         else if($tipo==2){
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<25){
	            		$array=array("max_v" => $valor['prmax']);
	            		$arraymaxv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //1km a 20
         else if($tipo==3){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<50){
	            		$array=array("max_v" => $valor['prmax']);
	            		$arraymaxv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

        //5km a 20
         else if($tipo==4){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<250){
	            		$array=array("max_v" => $valor['prmax']);
	            		$arraymaxv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }
}       
        //CONVERSIONES MAC**********

if($macbox==1){ 

        	if($tipo==0){
			$i=0;
			  
				foreach ($detalles as $valor) {	
				           		
		            		$array=array("mac_v" => $valor['mac_prom']);
		            		$arraymacv[]=$array;
		            		$i++;
		        
	        }
        }

		//100m a 20m
		 else if($tipo==1){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<5){
	            		$array=array("mac_v" => $valor['mac_prom']);
	            		$arraymacv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //500m a 20m
         else if($tipo==2){
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<25){
	            		$array=array("mac_v" => $valor['mac_prom']);
	            		$arraymacv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //1km a 20
         else if($tipo==3){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<50){
	            		$array=array("mac_v" => $valor['mac_prom']);
	            		$arraymacv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

        //5km a 20
         else if($tipo==4){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<250){
	            		$array=array("mac_v" => $valor['mac_prom']);
	            		$arraymacv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }
}
        //CONVERSIONES FRIC**********

if($fricbox==1){ 

        	if($tipo==0){
			$i=0;
			  
				foreach ($detalles as $valor) {	
				           		
		            		$array=array("fric_v" => $valor['fric']);
		            		$arrayfricv[]=$array;
		            		$i++;
		        
	        }
        }

		//100m a 20m
		 else if($tipo==1){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<5){
	            		$array=array("fric_v" => $valor['fric']);
	            		$arrayfricv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //150m a 20m
		 else if($tipo==2){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<8){
	            		$array=array("fric_v" => $valor['fric']);
	            		$arrayfricv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //500m a 20m
        else  if($tipo==3){
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<25){
	            		$array=array("fric_v" => $valor['fric']);
	            		$arrayfricv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //1km a 20
         else if($tipo==4){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<50){
	            		$array=array("fric_v" => $valor['fric']);
	            		$arrayfricv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

        //5km a 20
         else if($tipo==5){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<250){
	            		$array=array("fric_v" => $valor['fric']);
	            		$arrayfricv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }
}
        //CONVERSIONES DEF**********
if($defbox==1){ 

        	if($tipo==0){
			$i=0;
			  
				foreach ($detalles as $valor) {	
				           		
		            		$array=array("def_v" => $valor['def']);
		            		$arraydefv[]=$array;
		            		$i++;
		        
	        }
        }

		//100m a 20m
		 else if($tipo==1){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<5){
	            		$array=array("def_v" => $valor['def']);
	            		$arraydefv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //150m a 20m
		 else if($tipo==2){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<8){
	            		$array=array("def_v" => $valor['def']);
	            		$arraydefv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //500m a 20m
        else  if($tipo==3){
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<25){
	            		$array=array("def_v" => $valor['def']);
	            		$arraydefv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //1km a 20
         else if($tipo==4){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<50){
	            		$array=array("def_v" => $valor['def']);
	            		$arraydefv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

        //5km a 20
         else if($tipo==5){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<250){
	            		$array=array("def_v" => $valor['def']);
	            		$arraydefv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }
}
        //CONVERSIONES DET**********
if($detbox==1){ 
        	if($tipo==0){
			$i=0;
			  
				foreach ($detalles as $valor) {	
				           		
		            		$array=array("det_v" => $valor['det']);
		            		$arraydetv[]=$array;
		            		$i++;
		        
	        }
        }

		//100m a 20m
		 else if($tipo==1){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<5){
	            		$array=array("det_v" => $valor['det']);
	            		$arraydetv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //150m a 20m
		 else if($tipo==2){  
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<8){
	            		$array=array("det_v" => $valor['det']);
	            		$arraydetv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //500m a 20m
        else  if($tipo==3){
			foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<25){
	            		$array=array("det_v" => $valor['det']);
	            		$arraydetv[]=$array;
	            		$i++;
	            		}
	            	


	        }
        }

        //1km a 20
         else if($tipo==4){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<50){
	            		$array=array("det_v" => $valor['det']);
	            		$arraydetv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }

        //5km a 20
         else if($tipo==5){
	        foreach ($detalles as $valor) {

	            	$i=0;

	            		while($i<250){
	            		$array=array("det_v" => $valor['det']);
	            		$arraydetv[]=$array;
	            		$i++;
	            		}
	            	$cont=0;


	        }
        }
}
///**** CONVERSIONES IRI *****/////

        //iri 100m
if($iribox==1){ 

        $cont=0;
		$iri=0;
		$arrayiric=array();
		foreach ($arrayiriv as $valor) {
            $iri+=$valor['iri_v'];
            $cont++;
            if($cont==5){
            	$i=0;
				$iri=$iri/5;
				 $iri=number_format($iri, 2, '.', ''); 
            	while($i<5){
            		$array=array("iri_c" => $iri);
            		$arrayiric[]=$array;
            		$i++;
            	}
            	$cont=0;
				$iri=0;
            }

        }


        // iri 1km
        $cont=0;
		$iri=0;
		
		$arrayirikm=array();
		foreach ($arrayiriv as $valor) {
            $iri+=$valor['iri_v'];
            $cont++;
            if($cont==50){
            	$i=0;
				$iri=$iri/50;
				$iri=number_format($iri, 2, '.', '');  
            	while($i<50){
            		$array=array("iri_km" => $iri);
            		$arrayirikm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$iri=0;
            }

        }


        //5km

        $cont=0;
		$iri=0;
		$arrayirickm=array();
		foreach ($arrayiriv as $valor) {
            $iri+=$valor['iri_v'];
            $cont++;
            if($cont==250){
            	$i=0;
				$iri=$iri/250;
				$iri=number_format($iri, 2, '.', ''); 
            	while($i<250){
            		$array=array("iri_ckm" => $iri);
            		$arrayirickm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$iri=0;
            }

        }
}        
        ///****** CONVERSIONES MAX *******////

        //MAX 100m
if($maxbox==1){ 

        $cont=0;
		$max=0;
		$arraymaxc=array();
		foreach ($arraymaxv as $valor) {
            $max+=$valor['max_v'];
            $cont++;
            if($cont==5){
            	$i=0;
				$max=$max/5;
				 $max=number_format($max, 2, '.', ''); 
            	while($i<5){
            		$array=array("max_c" => $max);
            		$arraymaxc[]=$array;
            		$i++;
            	}
            	$cont=0;
				$max=0;
            }

        }


        // max 1km
        $cont=0;
		$max=0;
		
		$arraymaxkm=array();
		foreach ($arraymaxv as $valor) {
            $max+=$valor['max_v'];
            $cont++;
            if($cont==50){
            	$i=0;
				$max=$max/50;
				$max=number_format($max, 2, '.', '');  
            	while($i<50){
            		$array=array("max_km" => $max);
            		$arraymaxkm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$max=0;
            }

        }


        //5km

        $cont=0;
		$max=0;
		$arraymaxckm=array();
		foreach ($arraymaxv as $valor) {
            $max+=$valor['max_v'];
            $cont++;
            if($cont==250){
            	$i=0;
				$max=$max/250;
				$max=number_format($max, 2, '.', ''); 
            	while($i<250){
            		$array=array("max_ckm" => $max);
            		$arraymaxckm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$max=0;
            }

        }

}
///****** CONVERSIONES MAC *******////

        //MAC 100m
if($macbox==1){ 

        $cont=0;
		$mac=0;
		$arraymacc=array();
		foreach ($arraymacv as $valor) {
            $mac+=$valor['mac_v'];
            $cont++;
            if($cont==5){
            	$i=0;
				$mac=$mac/5;
				 $mac=number_format($mac, 2, '.', ''); 
            	while($i<5){
            		$array=array("mac_c" => $mac);
            		$arraymacc[]=$array;
            		$i++;
            	}
            	$cont=0;
				$mac=0;
            }

        }


        // mac 1km
        $cont=0;
		$mac=0;
		
		$arraymackm=array();
		foreach ($arraymacv as $valor) {
            $mac+=$valor['mac_v'];
            $cont++;
            if($cont==50){
            	$i=0;
				$mac=$mac/50;
				$mac=number_format($mac, 2, '.', '');  
            	while($i<50){
            		$array=array("mac_km" => $mac);
            		$arraymackm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$mac=0;
            }

        }


        //5km

        $cont=0;
		$mac=0;
		$arraymacckm=array();
		foreach ($arraymacv as $valor) {
            $mac+=$valor['mac_v'];
            $cont++;
            if($cont==250){
            	$i=0;
				$mac=$mac/250;
				$mac=number_format($mac, 2, '.', ''); 
            	while($i<250){
            		$array=array("mac_ckm" => $mac);
            		$arraymacckm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$mac=0;
            }

        }
}
///****** CONVERSIONES FRIC *******////

        //fric 100m
if($fricbox==1){ 

        $cont=0;
		$fric=0;
		$arrayfricc=array();
		foreach ($arrayfricv as $valor) {
            $fric+=$valor['fric_v'];
            $cont++;
            if($cont==5){
            	$i=0;
				$fric=$fric/5;
				 $fric=number_format($fric, 2, '.', ''); 
            	while($i<5){
            		$array=array("fric_c" => $fric);
            		$arrayfricc[]=$array;
            		$i++;
            	}
            	$cont=0;
				$fric=0;
            }

        }


        // fric 1km
        $cont=0;
		$fric=0;
		
		$arrayfrickm=array();
		foreach ($arrayfricv as $valor) {
            $fric+=$valor['fric_v'];
            $cont++;
            if($cont==50){
            	$i=0;
				$fric=$fric/50;
				$fric=number_format($fric, 2, '.', '');  
            	while($i<50){
            		$array=array("fric_km" => $fric);
            		$arrayfrickm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$fric=0;
            }

        }


        //5km

        $cont=0;
		$fric=0;
		$arrayfricckm=array();
		foreach ($arrayfricv as $valor) {
            $fric+=$valor['fric_v'];
            $cont++;
            if($cont==250){
            	$i=0;
				$fric=$fric/250;
				$fric=number_format($fric, 2, '.', ''); 
            	while($i<250){
            		$array=array("fric_ckm" => $fric);
            		$arrayfricckm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$fric=0;
            }

        }
}
 ///****** CONVERSIONES DEF *******////

        //DEF 100m
if($defbox==1){ 

        $cont=0;
		$def=0;
		$arraydefc=array();
		foreach ($arraydefv as $valor) {
            $def+=$valor['def_v'];
            $cont++;
            if($cont==5){
            	$i=0;
				$def=$def/5;
				 $def=number_format($def, 2, '.', ''); 
            	while($i<5){
            		$array=array("def_c" => $def);
            		$arraydefc[]=$array;
            		$i++;
            	}
            	$cont=0;
				$def=0;
            }

        }


        // DEF 1km
        $cont=0;
		$def=0;
		
		$arraydefkm=array();
		foreach ($arraydefv as $valor) {
            $def+=$valor['def_v'];
            $cont++;
            if($cont==50){
            	$i=0;
				$def=$def/50;
				$def=number_format($def, 2, '.', '');  
            	while($i<50){
            		$array=array("def_km" => $def);
            		$arraydefkm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$def=0;
            }

        }


        //5km

        $cont=0;
		$def=0;
		$arraydefckm=array();
		foreach ($arraydefv as $valor) {
            $def+=$valor['def_v'];
            $cont++;
            if($cont==250){
            	$i=0;
				$def=$def/250;
				$def=number_format($def, 2, '.', ''); 
            	while($i<250){
            		$array=array("def_ckm" => $def);
            		$arraydefckm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$def=0;
            }

        }
}
///****** CONVERSIONES DET *******////

        //MAC 100m
if($detbox==1){ 
        $cont=0;
		$det=0;
		$arraydetc=array();
		foreach ($arraydetv as $valor) {
            $det+=$valor['det_v'];
            $cont++;
            if($cont==5){
            	$i=0;
				$det=$det/5;
				 $det=number_format($det, 2, '.', ''); 
            	while($i<5){
            		$array=array("det_c" => $det);
            		$arraydetc[]=$array;
            		$i++;
            	}
            	$cont=0;
				$det=0;
            }

        }


        // det 1km
        $cont=0;
		$det=0;
		
		$arraydetkm=array();
		foreach ($arraydetv as $valor) {
            $det+=$valor['det_v'];
            $cont++;
            if($cont==50){
            	$i=0;
				$det=$det/50;
				$det=number_format($det, 2, '.', '');  
            	while($i<50){
            		$array=array("det_km" => $det);
            		$arraydetkm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$det=0;
            }

        }


        //5km

        $cont=0;
		$det=0;
		$arraydetckm=array();
		foreach ($arraydetv as $valor) {
            $det+=$valor['det_v'];
            $cont++;
            if($cont==250){
            	$i=0;
				$det=$det/250;
				$det=number_format($det, 2, '.', ''); 
            	while($i<250){
            		$array=array("det_ckm" => $det);
            		$arraydetckm[]=$array;
            		$i++;
            	}
            	$cont=0;
				$det=0;
            }

        }
}        
        $detalles=$this->tramo_model->getDetallesByTramo($tramo);


        if($iribox==1){ 
        $this->auscultacion_model->actualizaririv($detalles,$arrayiriv);
        $this->auscultacion_model->actualizariric($detalles,$arrayiric);
        $this->auscultacion_model->actualizaririkm($detalles,$arrayirikm);
        $this->auscultacion_model->actualizaririckm($detalles,$arrayirickm);
        }

        if($maxbox==1){ 
        $this->auscultacion_model->actualizarmaxv($detalles,$arraymaxv);
        $this->auscultacion_model->actualizarmaxc($detalles,$arraymaxc);
        $this->auscultacion_model->actualizarmaxkm($detalles,$arraymaxkm);
        $this->auscultacion_model->actualizarmaxckm($detalles,$arraymaxckm);
        }

        if($macbox==1){ 
        $this->auscultacion_model->actualizarmacv($detalles,$arraymacv);
        $this->auscultacion_model->actualizarmacc($detalles,$arraymacc);
        $this->auscultacion_model->actualizarmackm($detalles,$arraymackm);
        $this->auscultacion_model->actualizarmacckm($detalles,$arraymacckm);
        }

        if($fricbox==1){ 
        $this->auscultacion_model->actualizarfricv($detalles,$arrayfricv);
        $this->auscultacion_model->actualizarfricc($detalles,$arrayfricc);
        $this->auscultacion_model->actualizarfrickm($detalles,$arrayfrickm);
        $this->auscultacion_model->actualizarfricckm($detalles,$arrayfricckm);
        }

        if($defbox==1){ 
        $this->auscultacion_model->actualizardefv($detalles,$arraydefv);
        $this->auscultacion_model->actualizardefc($detalles,$arraydefc);
        $this->auscultacion_model->actualizardefkm($detalles,$arraydefkm);
        $this->auscultacion_model->actualizardefckm($detalles,$arraydefckm);
        }

		if($detbox==1){ 
        $this->auscultacion_model->actualizardetv($detalles,$arraydetv);
        $this->auscultacion_model->actualizardetc($detalles,$arraydetc);
        $this->auscultacion_model->actualizardetkm($detalles,$arraydetkm);
        $this->auscultacion_model->actualizardetckm($detalles,$arraydetckm);
        }
        
        $_SESSION['ausc']="exito";
	redirect('tramo', 'refresh');
        
	}

	public function graficas()
	{
		$id=$_GET['id'];
		$tipo=$_GET['tipo'];
		$iri=$_GET['iri'];
		$max=$_GET['max'];
		$mac=$_GET['mac'];
		$fric=$_GET['fric'];
		$def=$_GET['def'];
		$det=$_GET['det'];
        $carretera=$this->tramo_model->getCarreteraNom($id);
		$clave=$this->tramo_model->getClave($id);
		$this->load->view('header');
		$this->load->view('pantallaGraficaAuscultacion',compact('id','tipo','iri','max','mac','fric','def','det','carretera','clave'));


	}

	public function editar()
	{
		if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){
			$id=$_GET['id'];
			$tramo=$this->tramo_model->getById($id);
			$clasificaciones=$this->catalogo_model->getItems(10);	
			$cuerpos=$this->catalogo_model->getItems(11);
			$this->load->view('head');
			$this->load->view('pantallaEditarTramo',compact('tramo','clasificaciones','cuerpos'));
			$this->load->view('footer');
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
			$this->tramo_model->eliminar($id);
			if(is_dir("img/".$carpeta)){
			$this->tramo_model->eliminarDir("img/".$carpeta);
			}
			$this->usuario_model->log("Elimino Tramo ".$carpeta);
			$_SESSION['eliminado']="exito";
		}
		redirect('tramo', 'refresh');
	}



}

}else{
	class Auscultacion extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}