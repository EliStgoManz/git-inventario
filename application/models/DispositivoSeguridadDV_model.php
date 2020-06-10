<?php


class DispositivoSeguridadDV_Model extends CI_Model{

    var $id;
    var $tramoInicial;
    var $sentido;
    var $nombredispositivo;
    var $clave;
    var $lado;
    var $longnorm;
    var $colornorm;
    var $formnorm;
    var $pictonorm;
    var $estfisico;
    var $dimdis;
    var $msjcong;
    var $senalncumple;
    var $senalfalta;
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

    public function getLado() {
        return $this->lado;
    }
   
    public function setLado($lado) {
        $this->lado = $lado;
        return $this;
    }

    public function getSentido() {
        return $this->sentido;
    }
   
    public function setSentido($sentido) {
        $this->sentido = $sentido;
        return $this;
    }

    public function getNombreDispositivo() {
        return $this->nombredispositivo;
    }
   
    public function setNombreDispositivo($nombredispositivo) {
        $this->nombredispositivo = $nombredispositivo;
        return $this;
    }

    public function getClave() {
        return $this->clave;
    }
   
    public function setClave($clave) {
        $this->clave = $clave;
        return $this;
    }
    
    public function getLongNorm() {
        return $this->longnorm;
    }
   
    public function setLongNorm($longnorm) {
        $this->longnorm = $longnorm;
        return $this;
    }

    public function getColorNorm() {
        return $this->colornorm;
    }
   
    public function setColorNorm($colornorm) {
        $this->colornorm = $colornorm;
        return $this;
    }

     public function getFormNorm() {
        return $this->formnorm;
    }
   
    public function setFormNorm($formnorm) {
        $this->formnorm = $formnorm;
        return $this;
    }

    public function getPictoNorm() {
        return $this->pictonorm;
    }
   
    public function setPictoNorm($pictonorm) {
        $this->pictonorm = $pictonorm;
        return $this;
    }

     public function getEstFisico() {
        return $this->estfisico;
    }
   
    public function setEstFisico($estfisico) {
        $this->estfisico = $estfisico;
        return $this;
    }

    public function getDimDis() {
        return $this->dimdis;
    }
   
    public function setDimDis($dimdis) {
        $this->dimdis = $dimdis;
        return $this;
    }

    public function getMsjCong() {
        return $this->msjcong;
    }
   
    public function setMsjCong($msjcong) {
        $this->msjcong = $msjcong;
        return $this;
    }
    
    public function getSenalNCumple() {
        return $this->senalncumple;
    }
   
    public function setSenalNCumple($senalncumple) {
        $this->senalncumple = $senalncumple;
        return $this;
    }
    
    public function getSenalFalta() {
        return $this->senalfalta;
    }
   
    public function setSenalFalta($senalfalta) {
        $this->senalfalta = $senalfalta;
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
        $query = $this->db->query('SELECT a.id,a.carretera,a.clave_tramo,count(c.id) total from tramo a,detalle_tramo b, dispositivo_vertical c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id');
		return $query->result();
	}

    function getTotal(){

        $query = $this->db->query('SELECT count(*) id from dispositivo_vertical');
        $id=$query->row_array();
        return $id['id'];

    }
    
    function getTotalNCumple($id){

        $query = $this->db->query('SELECT a.*,sum(c.cumple_normativa) totalncumple from tramo a,detalle_tramo b, dispositivo_vertical c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' and c.cumple_normativa=1 group by id');
        $id=$query->row_array();
        return $id['totalncumple'];

    }

    function getById($id){
        $query = $this->db->query('SELECT * from dispositivo_vertical where id='.$id);
        return $query->result();
    }

    function getDispositivosByTramo($id,$sc){

        $query = $this->db->query('SELECT c.id,
        (select latitud from detalle_tramo where id=c.detalle_tramo_inicial) latini,
        (select longitud from detalle_tramo where id=c.detalle_tramo_inicial) longini,
        (select img_central from detalle_tramo where id=c.detalle_tramo_inicial) imagen,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_inicial) mtsini,
        (select descripcion from catalogo_item where id=c.nombre_dispositivo) nombremarca,
        c.longnorm,
        c.color_cumple, 
        c.forma_cumple,
        c.pictograma_cumple,
        c.estado_cumple,
        c.mensaje_cumple,
        c.dimensiones_cumple,
        c.lado,
        c.cumple_normativa,
        c.falta,
        c.longncumple,
        c.longfalta,
        c.clave,
        c.obs,
        c.accion
        from tramo a,detalle_tramo b, dispositivo_vertical c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' and c.seccion_id='.$sc);
        return $query->result();

    }



    function getClaveItem($id){

        $query = $this->db->query('SELECT clave_tramo from tramo where id='.$id);
        $clave=$query->row_array();
        return $clave['clave_tramo'];

    }



    function insertar($dispositivo)
    {

        $this->db->set('detalle_tramo_inicial', $dispositivo->getTramoInicial());
        $this->db->set('sentido', $dispositivo->getSentido());
        $this->db->set('nombre_dispositivo', $dispositivo->getNombreDispositivo());
        $this->db->set('lado', $dispositivo->getLado());
        $this->db->set('clave', $dispositivo->getClave());
        $this->db->set('longnorm', $dispositivo->getLongNorm());
        $this->db->set('color_cumple', $dispositivo->getColorNorm());
        $this->db->set('forma_cumple', $dispositivo->getFormNorm());
        $this->db->set('pictograma_cumple', $dispositivo->getPictoNorm());
        $this->db->set('estado_cumple', $dispositivo->getEstFisico());
        $this->db->set('mensaje_cumple', $dispositivo->getMsjCong());
        $this->db->set('dimensiones_cumple', $dispositivo->getDimDis());
        $this->db->set('cumple_normativa', $dispositivo->getSenalNCumple());
        $this->db->set('falta', $dispositivo->getSenalFalta());
        $this->db->set('longncumple', $dispositivo->getLongNCumple());
        $this->db->set('longfalta', $dispositivo->getLongFalta());
        $this->db->set('obs',$dispositivo->getObservacion());
        $this->db->set('accion', $dispositivo->getAccion());
        $this->db->set('fecha', $dispositivo->getFecha());
        $this->db->set('seccion_id', $dispositivo->getSeccion());
        $this->db->set('usuario_id', $dispositivo->getUsuarioId());
        $this->db->insert('dispositivo_vertical');

    }
    

    function actualizar($dispositivo)
    {
        $id = $dispositivo->getId();

        $data = array(
               'nombre_dispositivo' => $dispositivo->getNombreDispositivo(),
               'lado' => $dispositivo->getLado(),
               'clave' => $dispositivo->getClave(),
               'longnorm' => $dispositivo->getLongNorm(),
               'color_cumple' => $dispositivo->getColorNorm(),
               'forma_cumple' => $dispositivo->getFormNorm(),
               'pictograma_cumple' => $dispositivo->getPictoNorm(),
               'estado_cumple' => $dispositivo->getEstFisico(),
               'mensaje_cumple' => $dispositivo->getMsjCong(),
               'dimensiones_cumple' => $dispositivo->getDimDis(),
               'cumple_normativa' => $dispositivo->getSenalNCumple(),
               'falta' => $dispositivo->getSenalFalta(),
               'longncumple' => $dispositivo->getLongNCumple(),
               'longfalta' => $dispositivo->getLongFalta(),               
               'obs' => $dispositivo->getObservacion(),
               'accion' => $dispositivo->getAccion()


            );

        $this->db->where('id', $id);
        $this->db->update('dispositivo_vertical', $data); 
    }

    function eliminarById($id){

        $query = $this->db->query('DELETE from dispositivo_vertical where id='.$id);
        

    }


    function eliminar($id){

        $query = $this->db->query('DELETE from dispositivo_vertical where id in ( Select * from (SELECT a.id from dispositivo_vertical a, detalle_tramo b where a.detalle_tramo_inicial=b.id and b.tramo_id='.$id.') as p)');
        

    }

    function eliminarSc($id){
        
        $query = $this->db->query('DELETE from dispositivo_vertical where seccion_id='.$id);
                
        
    }
    

}