<?php


class Catalogo_Model extends CI_Model{

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
        $query = $this->db->get('catalogo');
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
        $query = $this->db->query('SELECT * from catalogo where id='.$id);
        return $query->result();
    }

    function getItems($id){

        $query = $this->db->query('SELECT * from catalogo_item where catalogo_id='.$id);
        return $query->result();

    }

    function getItemById($id){

        $query = $this->db->query('SELECT * from catalogo_item where id='.$id);
        return $query->result();

    }


    function getClaveItem($id){

        $query = $this->db->query('SELECT descripcion from clave where item_id='.$id);
        $clave=$query->row_array();
        return $clave['descripcion'];

    }

    function getItemsClave($id){
        $query = $this->db->query('SELECT a.id,a.descripcion,b.descripcion clave from catalogo_item a,clave b where a.id=b.item_id and a.catalogo_id='.$id);
        return $query->result();
    }

    function getItemsCat($id,$idcat){
        $query = $this->db->query('SELECT a.id,a.descripcion,b.descripcion clave,c.categoria_id from catalogo_item a,clave b,item_detalle c where a.id=b.item_id and c.catalogo_item_id=a.id and a.catalogo_id='.$id.' and c.categoria_id='.$idcat );
        return $query->result();
    }

    function getItemsDetallado($id){
        $query = $this->db->query('SELECT a.id,a.descripcion,b.descripcion clave from catalogo_item a,clave b where a.id=b.item_id and a.catalogo_id='.$id);
        return $query->result();
    }



    function insertar($catalogo)
    {
        $this->db->set('descripcion', $catalogo);
        $this->db->insert('catalogo');

    }

    function insertarItem($item,$id)
    {
        $this->db->set('descripcion', $item);
        $this->db->set('catalogo_id', $id);
        $this->db->insert('catalogo_item');

    }

    function insertarClave($clave,$id)
    {
        $this->db->set('descripcion', $clave);
        $this->db->set('item_id', $id);
        $this->db->insert('clave');

    }
	
    function eliminarById($id){

        $query = $this->db->query('DELETE from catalogo_item where id='.$id);
        

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
            $this->db->set('img_central', $row['E'].'_S.JPEG');
            $this->db->set('img_derecha', $row['F'].'_S.JPEG');
            $this->db->set('img_izquierda', $row['G'].'_S.JPEG');
            $this->db->set('tramo_id', $id);
            $this->db->insert('detalle_tramo');
            }
            $cont++;
        } 
    }


    

    function actualizarItem($item,$id)
    {

        $data = array(
               'descripcion' => $item
            );

        $this->db->where('id', $id);
        $this->db->update('catalogo_item', $data); 
    }

    

}