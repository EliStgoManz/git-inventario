<?php


class DispositivoSeguridadDH_Model extends CI_Model{

    var $id;
    var $tramoInicial;
    var $tramoFinal;
    var $nombremarca;
    var $clavemarca;
    var $colormarca;
    var $anchomarca;
    var $reflejante;
    var $botones;
    var $longncumple;
    var $longfalta;
    var $obs;
    var $accion;
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

    public function getNombreMarca() {
        return $this->nombremarca;
    }
   
    public function setNombreMarca($nombremarca) {
        $this->nombremarca = $nombremarca;
        return $this;
    }

     public function getClaveMarca() {
        return $this->clavemarca;
    }
   
    public function setClaveMarca($clavemarca) {
        $this->clavemarca = $clavemarca;
        return $this;
    }

    public function getColorMarca() {
        return $this->colormarca;
    }
   
    public function setColorMarca($colormarca) {
        $this->colormarca = $colormarca;
        return $this;
    }

     public function getAnchoMarca() {
        return $this->anchomarca;
    }
   
    public function setAnchoMarca($anchomarca) {
        $this->anchomarca = $anchomarca;
        return $this;
    }

    public function getReflejante() {
        return $this->reflejante;
    }
   
    public function setReflejante($reflejante) {
        $this->reflejante = $reflejante;
        return $this;
    }

    public function getBotones() {
        return $this->botones;
    }
   
    public function setBotones($botones) {
        $this->botones = $botones;
        return $this;
    }

    public function getLongNCumple() {
        return $this->longncumple;
    }
   
    public function setLongNCumple($longncumple) {
        $this->longncumple = $longncumple;
        return $this;
    }

    public function getLongFalta() {
        return $this->longfalta;
    }
   
    public function setLongFalta($longfalta) {
        $this->longfalta = $longfalta;
        return $this;
    }
    
    public function getObservacion() {
        return $this->obs;
    }
   
    public function setObservacion($obs) {
        $this->obs = $obs;
        return $this;
    }

    public function getAccion() {
        return $this->accion;
    }
   
    public function setAccion($accion) {
        $this->accion = $accion;
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
        $query = $this->db->query('SELECT a.id,a.carretera,a.clave_tramo,count(c.id) total from tramo a,detalle_tramo b, dispositivo_horizontal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id');
		return $query->result();
	}

    function getTotal(){

        $query = $this->db->query('SELECT count(*) id from dispositivo_horizontal');
        $id=$query->row_array();
        return $id['id'];

    }
    
    function getTotalNCumple($id){

        $query = $this->db->query('SELECT a.id,sum(c.longncumple) totalncumple,sum(c.longfalta) totalfalta from tramo a,detalle_tramo b, dispositivo_horizontal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' group by id');
        $id=$query->row_array();
        return $id['totalncumple'];

    }

    function getTotalFalta($id){

        $query = $this->db->query('SELECT a.id,sum(c.longncumple) totalncumple,sum(c.longfalta) totalfalta from tramo a,detalle_tramo b, dispositivo_horizontal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' group by id');
        $id=$query->row_array();
        return $id['totalfalta'];

    }

    function getById($id){
        $query = $this->db->query('SELECT * from dispositivo_horizontal where id='.$id);
        return $query->result();
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
        (select descripcion from catalogo_item where id=c.nombre_marca) nombremarca,
        c.clave_marca, 
        (select descripcion from catalogo_item where id=c.color_marca) colormarca, 
        c.ancho_marca,
        c.marca_reflejante,
        c.botones,
        c.longncumple,
        c.longfalta,
        c.obs,
        c.accion
        from tramo a,detalle_tramo b, dispositivo_horizontal c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' and c.seccion_id='.$sc);
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
        $this->db->set('nombre_marca', $dispositivo->getNombreMarca());
        $this->db->set('clave_marca', $dispositivo->getClaveMarca());
        $this->db->set('color_marca', $dispositivo->getColorMarca());
        $this->db->set('ancho_marca', $dispositivo->getAnchoMarca());
        $this->db->set('marca_reflejante', $dispositivo->getReflejante());
        $this->db->set('botones', $dispositivo->getBotones());
        $this->db->set('longncumple', $dispositivo->getLongNCumple());
        $this->db->set('longfalta', $dispositivo->getLongFalta());
        $this->db->set('obs',$dispositivo->getObservacion());
        $this->db->set('accion', $dispositivo->getAccion());
        $this->db->set('fecha', $dispositivo->getFecha());
        $this->db->set('seccion_id', $dispositivo->getSeccion());
        $this->db->set('usuario_id', $dispositivo->getUsuarioId());
        $this->db->insert('dispositivo_horizontal');

    }
    

    function actualizar($dispositivo)
    {
        $id = $dispositivo->getId();

        $data = array(
               'nombre_marca'  => $dispositivo->getNombreMarca(),
               'clave_marca'  => $dispositivo->getClaveMarca(),
               'color_marca' => $dispositivo->getColorMarca(),
               'ancho_marca' => $dispositivo->getAnchoMarca(),
               'marca_reflejante' => $dispositivo->getReflejante(),
               'botones' => $dispositivo->getBotones(),
               'longncumple' => $dispositivo->getLongNCumple(),
               'longfalta' => $dispositivo->getLongFalta(),
               'obs' => $dispositivo->getObservacion(),
               'accion' => $dispositivo->getAccion()


            );

        $this->db->where('id', $id);
        $this->db->update('dispositivo_horizontal', $data); 
    }

    function eliminarById($id){

        $query = $this->db->query('DELETE from dispositivo_horizontal where id='.$id);
        

    }

    function eliminar($id){

        $query = $this->db->query('DELETE from dispositivo_horizontal where id in ( Select * from (SELECT a.id from dispositivo_horizontal a, detalle_tramo b where a.detalle_tramo_inicial=b.id and b.tramo_id='.$id.') as p)');
   

    }

    function eliminarSc($id){
        
        $query = $this->db->query('DELETE from dispositivo_horizontal where seccion_id='.$id);
                
        
    }

    

}