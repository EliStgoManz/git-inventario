<?php


class DispositivoSeguridadSN_Model extends CI_Model{

    var $id;
    var $tramoInicial;
    var $ubicacion;
    var $nsenales;
    var $usuarioId;
    var $fecha;
    var $seccion;

    
     public function getId() {
        return $this->id;
    }
   
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTramoInicial() {
        return $this->tramoInicial;
    }
   
    public function setTramoInicial($tramoInicial) {
        $this->tramoInicial = $tramoInicial;
        return $this;
    }
    
    public function getUbicacion() {
        return $this->ubicacion;
    }
   
    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
        return $this;
    }

     public function getNSenales() {
        return $this->nsenales;
    }
   
    public function setNSenales($nsenales) {
        $this->nsenales = $nsenales;
        return $this;
    }

    public function getFecha() {
        return $this->fecha;
    }
   
    public function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }

    public function getSeccion() {
        return $this->seccion;
    }
   
    public function setSeccion($seccion) {
        $this->seccion = $seccion;
        return $this;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }
   
    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
        return $this;
    }

	
	

	
	//MEtodos de la BD

	function __construct()
	{
		// Llamando al contructor del Modelo
		parent::__construct();
	}
	
	
	function getAll(){
        $query = $this->db->query('SELECT a.id,a.carretera,a.clave_tramo,count(c.id) total from tramo a,detalle_tramo b, senal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id');
		return $query->result();
	}

    function getTotal(){
        $query = $this->db->query('SELECT SUM(nsenales) id from senal');
        $id=$query->row_array();
        return $id['id'];
    }
    
    function getTotalByTramo($id){
        $query = $this->db->query('SELECT a.*,sum(c.nsenales) totalncumple from tramo a,detalle_tramo b, senal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.'  group by id');
        $id=$query->row_array();
        return $id['totalncumple'];
    }

    function getDispositivosByTramo($id,$sc){

        $query = $this->db->query('SELECT c.id,
        (select latitud from detalle_tramo where id=c.detalle_tramo_inicial) latini,
        (select longitud from detalle_tramo where id=c.detalle_tramo_inicial) longini,
        (select img_central from detalle_tramo where id=c.detalle_tramo_inicial) imagen,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_inicial) mtsini,
        c.lado,
        c.nsenales 
        from tramo a,detalle_tramo b, senal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' and c.seccion_id='.$sc);
        return $query->result();

    }



    function getClave($id){

        $query = $this->db->query('SELECT clave_tramo from tramo where id='.$id);
        $clave=$query->row_array();
        return $clave['clave_tramo'];

    }



    function insertar($dispositivo)
    {

        $this->db->set('detalle_tramo_inicial', $dispositivo->getTramoInicial());
        $this->db->set('lado', $dispositivo->getUbicacion());
        $this->db->set('nsenales', $dispositivo->getNSenales());
        $this->db->set('usuario_id', $dispositivo->getUsuarioId());
         $this->db->set('fecha', $dispositivo->getFecha());
         $this->db->set('seccion_id', $dispositivo->getSeccion());
        $this->db->insert('senal');

    }
    

    function actualizar($carrera)
    {
        $id = $carrera->getId();

        $data = array(
               'nombre' => $carrera->getNombre(),
               'coordinador_id' => $carrera->getCoordinador_id(),
            );

        $this->db->where('id', $id);
        $this->db->update('carrera', $data); 
    }

    function eliminarById($id){

        $query = $this->db->query('DELETE from senal where id='.$id);
        

    }

    function eliminar($id){

        $query = $this->db->query('DELETE from senal where id in ( Select * from (SELECT a.id from senal a, detalle_tramo b where a.detalle_tramo_inicial=b.id and b.tramo_id='.$id.') as p)');
   

    }

    function eliminarSc($id){
        
        $query = $this->db->query('DELETE from senal where seccion_id='.$id);
                
        
    }

    

}