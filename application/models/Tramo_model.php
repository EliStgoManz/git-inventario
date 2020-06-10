<?php


class Tramo_Model extends CI_Model{

	var $id;
	var $carretera;
    var $claveTramo;
    var $ciudadInicio;
    var $ciudadFin;
    var $latInicio;
    var $longInicio;
    var $latFin;
    var $longFin;
    var $longitud;
    var $ruta;
    var $m_inicio;
    var $m_fin;
    var $clasificacionCamino;
    var $cuerpo;
    var $carril;
    var $sentido;
    var $usuarioId;



	
	 public function getId() {
        return $this->id;
    }
   
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getCarretera() {
        return $this->carretera;
    }
   
    public function setCarretera($carretera) {
        $this->carretera = $carretera;
        return $this;
    }
    
	public function getClaveTramo() {
        return $this->claveTramo;
    }
   
    public function setClaveTramo($claveTramo) {
        $this->claveTramo = $claveTramo;
        return $this;
    }

     public function getCiudadInicio() {
        return $this->ciudadInicio;
    }
   
    public function setCiudadInicio($ciudadInicio) {
        $this->ciudadInicio = $ciudadInicio;
        return $this;
    }

    public function getCiudadFin() {
        return $this->ciudadFin;
    }
   
    public function setCiudadFin($ciudadFin) {
        $this->ciudadFin = $ciudadFin;
        return $this;
    }

     public function getLatInicio() {
        return $this->latInicio;
    }
   
    public function setLatInicio($latInicio) {
        $this->latInicio = $latInicio;
        return $this;
    }

    public function getLongInicio() {
        return $this->longInicio;
    }
   
    public function setLongInicio($longInicio) {
        $this->longInicio = $longInicio;
        return $this;
    }

    public function getLatFin() {
        return $this->latFin;
    }
   
    public function setLatFin($latFin) {
        $this->latFin = $latFin;
        return $this;
    }

    public function getLongFin() {
        return $this->longFin;
    }
   
    public function setLongFin($longFin) {
        $this->longFin = $longFin;
        return $this;
    }

    public function getLongitud() {
        return $this->longitud;
    }
   
    public function setLongitud($longitud) {
        $this->longitud = $longitud;
        return $this;
    }
    
    public function getRuta() {
        return $this->ruta;
    }
   
    public function setRuta($ruta) {
        $this->ruta = $ruta;
        return $this;
    }

    public function getMInicio() {
        return $this->m_inicio;
    }
   
    public function setMInicio($m_inicio) {
        $this->m_inicio = $m_inicio;
        return $this;
    }

    public function getMFin() {
        return $this->m_fin;
    }
   
    public function setMFin($m_fin) {
        $this->m_fin = $m_fin;
        return $this;
    }

    public function getCuerpo() {
        return $this->cuerpo;
    }
   
    public function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
        return $this;
    }

    public function getCarril() {
        return $this->carril;
    }
   
    public function setCarril($carril) {
        $this->carril = $carril;
        return $this;
    }

    public function getSentido() {
        return $this->sentido;
    }
   
    public function setSentido($sentido) {
        $this->sentido = $sentido;
        return $this;
    }

    public function getClasificacion() {
        return $this->clasificacionCamino;
    }
   
    public function setClasificacion($clasificacionCamino) {
        $this->clasificacionCamino = $clasificacionCamino;
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
        $query = $this->db->get('tramo');
		return $query->result();
	}

    function getTotalTramos(){

        $query = $this->db->query('SELECT count(*) id from tramo');
        $id=$query->row_array();
        return $id['id'];

    }

    function getPermitidos(){
        $query = $this->db->query('SELECT a.* from tramo a,permisos b,seccion_tramo c where a.id=c.tramo_id and a.id=b.tramo_id and b.usuario_id='.$_SESSION['usuario'].' and c.seccion_id='.$_SESSION['sc']);
        return $query->result();
    }

    function getMaxId(){

        $query = $this->db->query('SELECT MAX(id) id from tramo');
        $id=$query->row_array();
        return $id['id'];

    }

    function getById($id){

        $query = $this->db->query('SELECT * from tramo where id='.$id);
        return $query->result();     

    }

    function getBySeccion(){
        
                $query = $this->db->query('SELECT * from tramo t ,seccion_tramo s where t.id=s.tramo_id and s.seccion_id='.$_SESSION['sc']);
                return $query->result();     
        
    }

    function getBySeccionId($id){
        
                $query = $this->db->query('SELECT * from tramo t ,seccion_tramo s where t.id=s.tramo_id and s.seccion_id='.$id);
                return $query->result();     
        
    }


    function getJson($id){

        $query = $this->db->query('SELECT img_central,cadenamiento_carretera,cadenamiento_geometrico from detalle_tramo where tramo_id='.$id);
        return $query->result();

    }


    function getClave($id){

        $query = $this->db->query('SELECT clave_tramo from tramo where id='.$id);
        $clave=$query->row_array();
        return $clave['clave_tramo'];

    }
    
    function getCarreteraNom($id){

        $query = $this->db->query('SELECT carretera from tramo where id='.$id);
        $clave=$query->row_array();
        return $clave['carretera'];

    }

    function getCadCar($id){

        $query = $this->db->query('SELECT cadenamiento_carretera from detalle_tramo where id='.$id);
        $clave=$query->row_array();
        return $clave['cadenamiento_carretera'];

    }



    function getKmInicial($id){

        $query = $this->db->query('SELECT m_inicio from tramo where id='.$id);
        $clave=$query->row_array();
        return $clave['m_inicio'];

    }

    function getDetalleTramoId($tramo,$foto,$sentido){

        $query = $this->db->query('SELECT b.id from tramo a, detalle_tramo b where a.clave_tramo="'.$tramo.'" and b.img_central="'.$foto.'" and a.sentido="'.$sentido.'" and b.tramo_id=a.id');
        $clave=$query->row_array();
        return $clave['id'];

    }

    function getDetalleTramoById($id){

        $query = $this->db->query('SELECT * from detalle_tramo where id='.$id);
        return $query->result();

    }

    function getDetallesByTramo($id){

        $query = $this->db->query('SELECT * from detalle_tramo where tramo_id='.$id);
        return $query->result();

    }

    function getSecciones(){
        
        $query = $this->db->query('SELECT * from seccion');
        return $query->result();
        
    }



    function insertar($tramo)
    {
        $this->db->set('carretera', $tramo->getCarretera());
        $this->db->set('clave_tramo', $tramo->getClaveTramo());
        $this->db->set('ciudad_inicio', $tramo->getCiudadInicio());
        $this->db->set('ciudad_fin', $tramo->getCiudadFin());
        $this->db->set('lat_inicio', $tramo->getLatInicio());
        $this->db->set('long_inicio', $tramo->getLongInicio());
        $this->db->set('lat_fin', $tramo->getLatFin());
        $this->db->set('long_fin', $tramo->getLongFin());
        $this->db->set('longitud', $tramo->getLongitud());
        $this->db->set('ruta', $tramo->getRuta());
        $this->db->set('m_inicio', $tramo->getMInicio());
        $this->db->set('m_fin', $tramo->getMFin());
        $this->db->set('cuerpo', $tramo->getCuerpo());
        $this->db->set('carril', $tramo->getCarril());
        $this->db->set('sentido', $tramo->getSentido());
        $this->db->set('clasificacion_camino', $tramo->getClasificacion());
        $this->db->set('usuario_id', $tramo->getUsuarioId());
        $this->db->insert('tramo');

    }
	

	

	function insertarDetalles($id,$get_sheetData)
    {

        $cont=1;
        $detalles=array();
        foreach ($get_sheetData as $row) {
            if($cont!=1){
            $array= array("latitud" => $row['A'],"longitud" =>$row['B'],"cadenamiento_carretera" =>$row['C'],"cadenamiento_geometrico" =>$row['D'],"img_central"=>$row['E'].'_S.jpeg',"img_derecha"=>$row['F'].'_S.jpeg',"img_izquierda"=>$row['G'].'_S.jpeg',"tramo_id"=>$id);
            $detalles[]=$array;
            }
            $cont++;
        } 
        $this->db->insert_batch('detalle_tramo', $detalles); 
    }


    

    function actualizar($tramo)
    {
        $id = $tramo->getId();

        $data = array(
               'carretera' => $tramo->getCarretera(),
               'clave_tramo' => $tramo->getClaveTramo(),
               'ciudad_inicio' => $tramo->getCiudadInicio(),
               'ciudad_fin' => $tramo->getCiudadFin(),
               'ruta' => $tramo->getRuta(),
               'clasificacion_camino' => $tramo->getClasificacion(),
               'cuerpo' => $tramo->getCuerpo()
            );

        $this->db->where('id', $id);
        $this->db->update('tramo', $data); 
    }


 







    function actualizarDetalle($id,$cadca,$cadgeo)
    {

        $data = array(
               'cadenamiento_carretera' => $cadca,
               'cadenamiento_geometrico' => $cadgeo
            );

        $this->db->where('id', $id);
        $this->db->update('detalle_tramo', $data); 
    }



    function eliminar($id){

     $query = $this->db->query('DELETE FROM tramo WHERE id='.$id);
 }

    function eliminarDetalles($id){

        $query = $this->db->query('DELETE from detalle_tramo where tramo_id='.$id);


    }

    function editarDir($old,$new){
        rename("img/".$old,"img/".$new);
    }

    function eliminarDir($carpeta)
    {
        foreach(glob($carpeta . "/*") as $archivos_carpeta)
        {
            
            if (is_dir($archivos_carpeta))
            {
                $this->eliminarDir($archivos_carpeta);
            }
            else
            {
                unlink($archivos_carpeta);
            }
        }
     
        rmdir($carpeta);
    }
    
     function crearTrasera($carpeta)
    {
        foreach(glob($carpeta . "/*") as $archivos_carpeta)
        {
            
            if (is_dir($archivos_carpeta))
            {
                mkdir($archivos_carpeta."/trasS1", 0700);
                mkdir($archivos_carpeta."/trasS2", 0700);
            }
        }
     

    }

}