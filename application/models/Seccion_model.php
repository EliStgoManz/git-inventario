<?php


class Seccion_Model extends CI_Model{

	var $id;
	var $descripcion;



	
	 public function getId() {
        return $this->id;
    }
   
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
   
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
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
        $query = $this->db->get('seccion');
		return $query->result();
    }
    
    function getAllTotal(){
        $query = $this->db->query('SELECT *,(SELECT count(*) from seccion_tramo a where a.seccion_id=s.id) as total FROM seccion s');
        return $query->result();
    }
    
    function getMaxId(){

        $query = $this->db->query('SELECT MAX(id) id from catalogo');
        $id=$query->row_array();
        return $id['id'];

    }

    function getMaxIdItem(){

        $query = $this->db->query('SELECT MAX(id) id from catalogo_item');
        $id=$query->row_array();
        return $id['id'];

    }

    function getById($id){
        $query = $this->db->query('SELECT * from seccion where id='.$id);
        return $query->result();
    }

    

    function insertar($seccion)
    {
        $this->db->set('descripcion', $seccion);
        $this->db->insert('seccion');
    }    
  
	
    function eliminarTramos($id){

        $query = $this->db->query('DELETE from seccion_tramo where seccion_id='.$id);
        

    }

    function eliminarTramo($id){

        $query = $this->db->query('DELETE from seccion_tramo where tramo_id='.$id);
        

    }

    function asignarTramos($id,$tramo)
    {
        $this->db->set('seccion_id', $id);
        $this->db->set('tramo_id', $tramo);
        $this->db->insert('seccion_tramo');

    }

    

    function actualizar($item,$id)
    {

        $data = array(
               'descripcion' => $item
            );

        $this->db->where('id', $id);
        $this->db->update('seccion', $data); 
    }

    function eliminar($id){
        
        $query = $this->db->query('DELETE from seccion where id='.$id);
        
    }

    

}