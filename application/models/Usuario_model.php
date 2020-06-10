<?php


class Usuario_Model extends CI_Model{

	var $id;
	var $nombre;
    var $paterno;
    var $materno;
    var $usuario;
    var $pass;
    var $ds;
    var $dh;
    var $dv;
    var $ml;
    var $sn;
    var $gc;


	
	 public function getId() {
        return $this->id;
    }
   
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getNombre() {
        return $this->nombre;
    }
   
    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPaterno() {
        return $this->paterno;
    }
   
    public function setPaterno($paterno) {
        $this->paterno = $paterno;
        return $this;
    }

    public function getMaterno() {
        return $this->materno;
    }
   
    public function setMaterno($materno) {
        $this->materno = $materno;
        return $this;
    }

    public function getUsuario() {
        return $this->usuario;
    }
   
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
        return $this;
    }

    public function getPass() {
        return $this->pass;
    }
   
    public function setPass($pass) {
        $this->pass = $pass;
        return $this;
    }

    public function getPerfil() {
        return $this->perfil;
    }
   
    public function setPerfil($perfil) {
        $this->perfil = $perfil;
        return $this;
    }    

    public function getDS() {
        return $this->ds;
    }
   
    public function setDS($ds) {
        $this->ds = $ds;
        return $this;
    }

    public function getDH() {
        return $this->dh;
    }
   
    public function setDH($dh) {
        $this->dh = $dh;
        return $this;
    }

    public function getDV() {
        return $this->dv;
    }
   
    public function setDV($dv) {
        $this->dv = $dv;
        return $this;
    }

    public function getML() {
        return $this->ml;
    }
   
    public function setML($ml) {
        $this->ml = $ml;
        return $this;
    }

    public function getSN() {
        return $this->sn;
    }
   
    public function setSN($sn) {
        $this->sn = $sn;
        return $this;
    }
    
    public function getGC() {
        return $this->gc;
    }
   
    public function setGC($gc) {
        $this->gc = $gc;
        return $this;
    }

	
	

	
	//MEtodos de la BD

	function __construct()
	{
		// Llamando al contructor del Modelo
		parent::__construct();
	}
	
	
	function getAll(){
        $this->db->order_by("id","asc");
        if($_SESSION['privilegio']!='SADM'){
        $this->db->where('perfil !=','ADM');
        $this->db->where('perfil !=','SADM');
        }
        $query = $this->db->get('usuario');
		return $query->result();
	}

    function getMaxId(){

        $query = $this->db->query('SELECT MAX(id) id from usuario');
        $id=$query->row_array();
        return $id['id'];

    }

    function getTotalUsuarios(){

        $query = $this->db->query('SELECT count(*) id from usuario where perfil!="ADM" and perfil!="SADM"');
        $id=$query->row_array();
        return $id['id'];

    }

    function getById($id){
        if($_SESSION['privilegio']=='ADM'){
        $query = $this->db->query('SELECT * from usuario where id='.$id.' and perfil!="ADM" and perfil!="SADM"');
        }
        if($_SESSION['privilegio']=='SADM'){
        $query = $this->db->query('SELECT * from usuario where id='.$id);
        }

        return $query->result();
    }

    function getPerfilUsuario(){

        $query = $this->db->query('SELECT * from usuario where id='.$_SESSION['usuario']);
        return $query->result();
    }

    function getPrivilegios(){

        $query = $this->db->query('SELECT ds,dh,dv,ml,sn from usuario where id='.$_SESSION['usuario']);
        return $query->result();
    }

    function getTramosPermitidos($id){

        $query = $this->db->query('SELECT tramo_id FROM `permisos` WHERE usuario_id='.$id);
        return $query->result();
    }



    function insertar($usuario)
    {
        $this->db->set('nombre', $usuario->getNombre());
        $this->db->set('paterno', $usuario->getPaterno());
        $this->db->set('materno', $usuario->getMaterno());
        $this->db->set('user', $usuario->getUsuario());
        $this->db->set('pass', $usuario->getPass());
        $this->db->set('perfil', $usuario->getPerfil());
        $this->db->set('ds', $usuario->getDS());
        $this->db->set('dh', $usuario->getDH());
        $this->db->set('dv', $usuario->getDV());
        $this->db->set('ml', $usuario->getML());
        $this->db->set('sn', $usuario->getSN());
        $this->db->set('gc', $usuario->getGC());
        $this->db->insert('usuario');

    }

    function insertarPermisos($id,$tramo)
    {
        $this->db->set('usuario_id', $id);
        $this->db->set('tramo_id', $tramo);
        $this->db->insert('permisos');

    }

    function eliminarPermisos($id)
    {
        $query = $this->db->query('DELETE from permisos where usuario_id='.$id);

    }
    

    function actualizar($usuario)
    {

        $data = array(
               'nombre' => $usuario->getNombre(),
               'paterno'=> $usuario->getPaterno(),
               'materno'=> $usuario->getMaterno(),
               'pass'=> $usuario->getPass(),
               'ds'=> $usuario->getDS(),
               'dh'=> $usuario->getDS(),
               'dv'=> $usuario->getDS(),
               'ml'=> $usuario->getML(),
               'sn'=> $usuario->getSN(),
               'gc'=> $usuario->getGC()

            );

        $this->db->where('id', $usuario->getId());
        $this->db->update('usuario', $data); 
    }

    function log($descripcion)
    {
        $this->db->set('descripcion', $descripcion);
        $this->db->set('usuario_id', $_SESSION['usuario']);
        $this->db->insert('log_user');
    }

    

}