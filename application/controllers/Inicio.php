<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
session_start();

if($_SESSION!=null)  {

class Inicio extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
    } 
 
    public function index() { 
		
    	$usuarios=$this->usuario_model->getTotalUsuarios();
    	$tramos=$this->tramo_model->getTotalTramos();
    	$ds=$this->dispositivoSeguridad_model->getTotal();
    	$dh=$this->dispositivoSeguridadDH_model->getTotal();
    	$dv=$this->dispositivoSeguridadDV_model->getTotal();
    	$ml=$this->dispositivoSeguridadML_model->getTotal();
    	$sn=$this->dispositivoSeguridadSN_model->getTotal();
    	if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){		
		$tramoslist=$this->tramo_model->getAll();
		}else{		
		$tramoslist=$this->tramo_model->getPermitidos();	
		}
		$arraytramos[]=null;
    	foreach($tramoslist as $valor){
    		$id=$valor->id;
    		$clave=$valor->clave_tramo;
    		$carretera=$valor->carretera;
    		$de=$valor->ciudad_inicio;
    		$a=$valor->ciudad_fin;
    		$longitud=$valor->longitud;
    		$sentido=$valor->sentido;
    		$totalncumple=$this->dispositivoSeguridadDH_model->getTotalNCumple($id);
    		if(empty($totalncumple)){
    			$totalncumple=0;
    		}
    		$totalfalta=$this->dispositivoSeguridadDH_model->getTotalFalta($id);
    		if(empty($totalfalta)){
    			$totalfalta=0;
    		}

    		$totalsenales=$this->dispositivoSeguridadSN_model->getTotalByTramo($id);
    		if(empty($totalsenales)){
    			$totalsenales=0;
    		}

    		$totalncumplev=$this->dispositivoSeguridadDV_model->getTotalNCumple($id);
    		if(empty($totalncumplev)){
    			$totalncumplev=0;
    		}
    		$arraytramos[]=array("id"=>$id,"clave"=>$clave,"carretera"=>$carretera,"de"=>$de,"a"=>$a,"longitud"=>$longitud,"sentido"=>$sentido,"totalncumple"=>$totalncumple,"totalfalta"=>$totalfalta,"totalsenales"=>$totalsenales,"totalncumplev"=>$totalncumplev);
    	}
      	$this->load->view('head');
		$this->load->view('pantallaInicio',compact('usuarios','tramos','ds','dh','dv','ml','sn','arraytramos'));
		$this->load->view('footer');
	} 
	
	
}

}else{
	class Inicio extends CI_Controller {
		public function index()
		{
			$this->load->view('login');
		}
	}
}


?> 