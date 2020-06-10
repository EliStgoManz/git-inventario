<?php


class DispositivoSeguridadML_Model extends CI_Model{

    var $id;
    var $tramoInicial;
    var $tramoFinal;
    var $ubicacion;
    var $longitud;
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
    
    public function getTramoFinal() {
        return $this->tramoFinal;
    }
   
    public function setTramoFinal($tramoFinal) {
        $this->tramoFinal = $tramoFinal;
        return $this;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }
   
    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
        return $this;
    }

     public function getLongitud() {
        return $this->longitud;
    }
   
    public function setLongitud($longitud) {
        $this->longitud = $longitud;
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
        $query = $this->db->query('SELECT a.id,a.carretera,a.clave_tramo,count(c.id) total from tramo a,detalle_tramo b, maleza c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id');
		return $query->result();
	}

    function getTotal(){

        $query = $this->db->query('SELECT count(*) id from maleza');
        $id=$query->row_array();
        return $id['id'];

    }

    function getDispositivosByTramo($id,$sc){

        $query = $this->db->query('SELECT c.id,
        (select latitud from detalle_tramo where id=c.detalle_tramo_inicial) latini,
        (select longitud from detalle_tramo where id=c.detalle_tramo_inicial) longini,
        (select latitud from detalle_tramo where id=c.detalle_tramo_final) latfin,
        (select longitud from detalle_tramo where id=c.detalle_tramo_final) longfin,
        (select img_central from detalle_tramo where id=c.detalle_tramo_inicial) imagen,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_inicial) mtsini,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_final) mtsfin,
        c.lado,
        c.longitud 
        from tramo a,detalle_tramo b, maleza c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' and c.seccion_id='.$sc);
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
        $this->db->set('detalle_tramo_final', $dispositivo->getTramoFinal());
        $this->db->set('lado', $dispositivo->getUbicacion());
        $this->db->set('longitud', $dispositivo->getLongitud());
        $this->db->set('fecha', $dispositivo->getFecha());
        $this->db->set('seccion_id', $dispositivo->getSeccion());
        $this->db->set('usuario_id', $dispositivo->getUsuarioId());
        $this->db->insert('maleza');

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

        $query = $this->db->query('DELETE from maleza where id='.$id);
        

    }

    function eliminar($id){

        $query = $this->db->query('DELETE from maleza where id in ( Select * from (SELECT a.id from maleza a, detalle_tramo b where a.detalle_tramo_inicial=b.id and b.tramo_id='.$id.') as p)');
   

    }

    function eliminarSc($id){
        
        $query = $this->db->query('DELETE from maleza where seccion_id='.$id);
                
        
    }

    

}