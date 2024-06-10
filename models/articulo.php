<?php
class Articulo{
    private $conn;
    private $table = 'articulos';

    //Propiedades
    public $id;
    public $titulo;
    public $imagen;
    public $texto;
    public $fecha_creacion;

    //Constructor de nuestra clase
    public function __construct($db){
        $this->conn = $db;
    }

    //Obetener los artículos
    public function leer(){
        //Crear query
        $query = 'SELECT id, titulo, imagen, texto, fecha_creacion FROM ' . $this->table;

        //Preparar sentencia
        $stmt = $this->conn->prepare($query);

        //Ejecutar query
        $stmt->execute();
        $articulos = $stmt->fetchALL(PDO::FETCH_OBJ);
        return $articulos;
    }

    //Obtener un artículo individual
    public function leer_individual($id){
        //Crear query
        $query = 'SELECT id, titulo, imagen, texto, fecha_creacion FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

        //Preparar sentencia
        $stmt = $this->conn->prepare($query);

        //Vincular parámetro
        $stmt->bindParam(1, $id);

        //Ejecutar query
        $stmt->execute();
        $articulo = $stmt->fetch(PDO::FETCH_OBJ);
        return $articulo;
    }
    

    //Crear artículo
    public function crear($titulo, $newImageName, $texto){
        //Crear query
        $query = 'INSERT INTO ' . $this->table . ' (titulo, imagen, texto)VALUES(:titulo, :imagen, :texto) ';

        //Preparar la sentencia
        $stmt = $this->conn->prepare($query);

        //Vincular el parametro
        $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $newImageName, PDO::PARAM_STR);
        $stmt->bindParam(":texto", $texto, PDO::PARAM_STR);

        //Ejecutar la query
        if ($stmt->execute()){
            return true;
        }
    }

    //Función editar
    public function editar($id, $titulo, $imagen, $texto) {
        // Crear la consulta SQL UPDATE
        $query = 'UPDATE ' . $this->table . ' SET titulo = :titulo, imagen = :imagen, texto = :texto WHERE id = :id';
    
        // Preparar la sentencia
        $stmt = $this->conn->prepare($query);
    
        // Vincular los parámetros
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':texto', $texto, PDO::PARAM_STR);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La consulta se ejecutó correctamente
            return true;
        } else {
            // La consulta falló
            return false;
        }
    }
}