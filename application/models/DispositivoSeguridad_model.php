<?php


class DispositivoSeguridad_Model extends CI_Model{

    var $id;
    var $tramoInicial;
    var $tramoFinal;
    var $lado;
    var $longitud;
    var $cuerpo;
    var $tipoDispositivo;
    var $designacion;
    var $descSistema;
    var $tipoPoste;
    var $sePostes;
    var $altDisp;
    var $secInicio;
    var $secFinal;
    var $tbTrans;
    var $estfisico;
    var $observacion;
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
        return $tramoFinal;
    }

     public function getLado() {
        return $this->lado;
    }
   
    public function setLado($lado) {
        $this->lado = $lado;
        return $this;
    }
    
    public function getLongitud() {
        return $this->longitud;
    }
   
    public function setLongitud($longitud) {
        $this->longitud= $longitud;
        return $this;
    }

    public function getCuerpo() {
        return $this->cuerpo;
    }
   
    public function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
        return $this;
    }

     public function getTipoDispositivo() {
        return $this->tipoDispositivo;
    }
   
    public function setTipoDispositivo($tipoDispositivo) {
        $this->tipoDispositivo = $tipoDispositivo;
        return $this;
    }

    public function getDesignacion() {
        return $this->designacion;
    }
   
    public function setDesignacion($designacion) {
        $this->designacion = $designacion;
        return $this;
    }

    public function getDescSistema() {
        return $this->descSistema;
    }
   
    public function setDescSistema($descSistema) {
        $this->descSistema = $descSistema;
        return $this;
    }

    public function getTipoPoste() {
        return $this->tipoPoste;
    }
   
    public function setTipoPoste($tipoPoste) {
        $this->tipoPoste = $tipoPoste;
        return $this;
    }

    public function getSePostes() {
        return $this->sePostes;
    }
   
    public function setSePostes($sePostes) {
        $this->sePostes = $sePostes;
        return $this;
    }
    
    public function getAltDisp() {
        return $this->altDisp;
    }
   
    public function setAltDisp($altDisp) {
        $this->altDisp = $altDisp;
        return $this;
    }

    public function getSecInicio() {
        return $this->secInicio;
    }
   
    public function setSecInicio($secInicio) {
        $this->secInicio = $secInicio;
        return $this;
    }

    public function getSecFinal() {
        return $this->secFinal;
    }
   
    public function setSecFinal($secFinal) {
        $this->secFinal = $secFinal;
        return $this;
    }

    public function getTbTrans() {
        return $this->tbTrans;
    }
   
    public function setTbTrans($tbTrans) {
        $this->tbTrans = $tbTrans;
        return $this;
    }

    public function getEstadoFisico() {
        return $this->estfisico;
    }
   
    public function setEstadoFisico($estfisico) {
        $this->estfisico = $estfisico;
        return $this;
    }

    public function getObservacion() {
        return $this->observacion;
    }
   
    public function setObservacion($observacion) {
        $this->observacion = $observacion;
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
        $query = $this->db->query('SELECT a.*,count(c.id) total from tramo a,detalle_tramo b, dispositivo_seguridad c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id group by id');
		return $query->result();
	}

    function getTotal(){

        $query = $this->db->query('SELECT count(*) id from dispositivo_seguridad');
        $id=$query->row_array();
        return $id['id'];

    }

    function getCount(){
        $query = $this->db->query('SELECT a.id, count(c.id) total from tramo a,detalle_tramo b, dispositivo_seguridad c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id group by id');
        return $query->result();
    }

    function getById($id){
        $query = $this->db->query('SELECT * from dispositivo_seguridad where id='.$id);
        return $query->result();
    }

    function getDispositivosByTramo($id,$sc){

        $query = $this->db->query('SELECT c.id,
        (select latitud from detalle_tramo where id=c.detalle_tramo_inicial) latini,
        (select longitud from detalle_tramo where id=c.detalle_tramo_inicial) longini,
        (select latitud from detalle_tramo where id=c.detalle_tramo_final) latfin,
        (select longitud from detalle_tramo where id=c.detalle_tramo_final) longfin,
        (select img_central from detalle_tramo where id=c.detalle_tramo_inicial) imagen,
        (select cadenamiento_geometrico from detalle_tramo where id=c.detalle_tramo_inicial) inicio,
        (select cadenamiento_geometrico from detalle_tramo where id=c.detalle_tramo_final) fin,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_inicial) mtsini,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_final) mtsfin,
        c.lado,
        c.longitud, 
        (select descripcion from catalogo_item where id=c.tipo_dispositivo) dispositivo, 
        (select descripcion from catalogo_item where id=c.designacion) designacion, 
        (select descripcion from catalogo_item where id=c.descripcion_sistema) desc_sistema, 
        (select descripcion from catalogo_item where id=c.tipo_poste) tipo_poste,
        c.separacion_postes,
        c.altura_dispositivo,
        (select descripcion from catalogo_item where id=c.ts_extremas_inicio) tsinicio,
        (select descripcion from catalogo_item where id=c.ts_extremas_fin) tsfin, 
        (select descripcion from catalogo_item where id=c.tb_transicion) tbtransicion,
        (select descripcion from catalogo_item where id=c.estado_fisico) estfisico,
        c.observaciones
        from tramo a,detalle_tramo b, dispositivo_seguridad c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id and a.id='.$id.' and c.seccion_id='.$sc);
        return $query->result();

    }
    
    function getDispositivos(){

        $query = $this->db->query('SELECT c.id,
        (select latitud from detalle_tramo where id=c.detalle_tramo_inicial) latini,
        (select longitud from detalle_tramo where id=c.detalle_tramo_inicial) longini,
        (select latitud from detalle_tramo where id=c.detalle_tramo_final) latfin,
        (select longitud from detalle_tramo where id=c.detalle_tramo_final) longfin,
        (select img_central from detalle_tramo where id=c.detalle_tramo_inicial) imagen,
        (select cadenamiento_geometrico from detalle_tramo where id=c.detalle_tramo_inicial) inicio,
        (select cadenamiento_geometrico from detalle_tramo where id=c.detalle_tramo_final) fin,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_inicial) mtsini,
        (select cadenamiento_carretera from detalle_tramo where id=c.detalle_tramo_final) mtsfin,
        c.lado, 
        (select descripcion from catalogo_item where id=c.tipo_dispositivo) dispositivo, 
        (select descripcion from catalogo_item where id=c.designacion) designacion, 
        (select descripcion from catalogo_item where id=c.descripcion_sistema) desc_sistema, 
        (select descripcion from catalogo_item where id=c.tipo_poste) tipo_poste,
        c.separacion_postes,
        c.altura_dispositivo,
        (select descripcion from catalogo_item where id=c.ts_extremas_inicio) tsinicio,
        (select descripcion from catalogo_item where id=c.ts_extremas_fin) tsfin, 
        (select descripcion from catalogo_item where id=c.tb_transicion) tbtransicion,
        (select descripcion from catalogo_item where id=c.estado_fisico) estfisico,
        c.observaciones
        from tramo a,detalle_tramo b, dispositivo_seguridad c where c.detalle_tramo_inicial=b.id and a.id=b.tramo_id');
        return $query->result();

    }

    function getJson(){

        $query = $this->db->query('SELECT img_central from detalle_tramo');
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
        $this->db->set('lado', $dispositivo->getLado());
        $this->db->set('longitud', $dispositivo->getLongitud());
        $this->db->set('tipo_dispositivo', $dispositivo->getTipoDispositivo());
        $this->db->set('designacion', $dispositivo->getDesignacion());
        $this->db->set('descripcion_sistema', $dispositivo->getDescSistema());
        $this->db->set('tipo_poste', $dispositivo->getTipoPoste());
        $this->db->set('separacion_postes', $dispositivo->getSePostes());
        $this->db->set('altura_dispositivo', $dispositivo->getAltDisp());
        $this->db->set('ts_extremas_inicio', $dispositivo->getSecInicio());
        $this->db->set('ts_extremas_fin',$dispositivo->getSecFinal());
        $this->db->set('tb_transicion', $dispositivo->getTbTrans());
        $this->db->set('estado_fisico', $dispositivo->getEstadoFisico());
        $this->db->set('observaciones', $dispositivo->getObservacion());
        $this->db->set('fecha', $dispositivo->getFecha());
        $this->db->set('seccion_id', $dispositivo->getSeccion());
        $this->db->set('usuario_id', $dispositivo->getUsuarioId());
        $this->db->insert('dispositivo_seguridad');

    }
	

	

	function insertarDetalles($id,$get_sheetData)
    {

        $cont=1;
        foreach ($get_sheetData as $row) {
            if($cont!=1){
            $this->db->set('latitud', $row['A']);
            $this->db->set('longitud', $row['B']);
            $this->db->set('cadenamiento_carretera', $row['C']);
            $this->db->set('cadenamiento_geometrico', $row['D']);
            $this->db->set('img_central', $row['E'].'_S.jpeg');
            $this->db->set('img_derecha', $row['F'].'_S.jpeg');
            $this->db->set('img_izquierda', $row['G'].'_S.jpeg');
            $this->db->set('tramo_id', $id);
            $this->db->insert('detalle_tramo');
            }
            $cont++;
        } 
    }


    

    function actualizar($dispositivo)
    {
        $id = $dispositivo->getId();

        $data = array(
               'lado' => $dispositivo->getLado(),
               'tipo_dispositivo' => $dispositivo->getTipoDispositivo(),
               'designacion' => $dispositivo->getDesignacion(),
               'descripcion_sistema' => $dispositivo->getDescSistema(),
               'tipo_poste' => $dispositivo->getTipoPoste(),
               'separacion_postes' => $dispositivo->getSePostes(),
               'altura_dispositivo' => $dispositivo->getAltDisp(),
               'ts_extremas_inicio' => $dispositivo->getSecInicio(),
               'ts_extremas_fin' => $dispositivo->getSecFinal(),
               'tb_transicion' => $dispositivo->getTbTrans(),
               'estado_fisico' => $dispositivo->getEstadoFisico(),
               'observaciones' => $dispositivo->getObservacion()

            );

        $this->db->where('id', $id);
        $this->db->update('dispositivo_seguridad', $data); 
    }
    
    function actualizarLong($id,$longitud)
    {
       

        $data = array(
               'longitud' => $longitud

            );

        $this->db->where('id', $id);
        $this->db->update('dispositivo_seguridad', $data); 
    }

    function eliminarById($id){

        $query = $this->db->query('DELETE from dispositivo_seguridad where id='.$id);
        

    }

    function eliminar($id){

        $query = $this->db->query('DELETE from dispositivo_seguridad where id in ( Select * from (SELECT a.id from dispositivo_seguridad a, detalle_tramo b where a.detalle_tramo_inicial=b.id and b.tramo_id='.$id.') as p)');
        

    }

    function eliminarSc($id){
        
        $query = $this->db->query('DELETE from dispositivo_seguridad where seccion_id='.$id);
                
        
    }

}