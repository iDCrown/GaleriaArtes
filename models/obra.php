<?php
class Obra {
    private $conn;
    private $table = 'obras_arte';

    // Propiedades
    public $id_obra;
    public $titulo;
    public $id_artista;
    public $estilo;
    public $precio_salida;
    public $num_registro;
    public $nombre_artista; // Para almacenar el nombre del artista en las consultas

    // Constructor de nuestra clase
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener las obras
    public function leer() {
        // Crear query
        $query = 'SELECT o.id_obra, o.titulo, a.nombre AS nombre_artista, o.estilo, o.precio_salida 
                  FROM ' . $this->table . ' o
                  JOIN artistas a ON o.id_artista = a.id_artista';

        // Preparar sentencia
        $stmt = $this->conn->prepare($query);

        // Ejecutar query
        $stmt->execute();
        $obras = $stmt->fetchALL(PDO::FETCH_OBJ);
        return $obras;
    }

    // Obtener una obra individual
    public function leer_individual($id) {
        // Crear query
        $query = 'SELECT o.id_obra, o.titulo, o.id_artista, a.nombre AS nombre_artista, o.estilo, o.precio_salida, o.num_registro 
                  FROM ' . $this->table . ' o
                  JOIN artistas a ON o.id_artista = a.id_artista
                  WHERE id_obra = ? LIMIT 0,1';

        // Preparar sentencia
        $stmt = $this->conn->prepare($query);

        // Vincular parámetro
        $stmt->bindParam(1, $id);

        // Ejecutar query
        $stmt->execute();
        $obra = $stmt->fetch(PDO::FETCH_OBJ);
        return $obra;
    }

    // Crear obra
    public function crear($titulo, $id_artista, $estilo, $precio_salida, $num_registro) {
        // Crear query
        $query = 'INSERT INTO ' . $this->table . ' (titulo, id_artista, estilo, precio_salida, num_registro) 
                  VALUES(:titulo, :id_artista, :estilo, :precio_salida, :num_registro)';

        // Preparar la sentencia
        $stmt = $this->conn->prepare($query);

        // Vincular los parámetros
        $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindParam(":id_artista", $id_artista, PDO::PARAM_INT);
        $stmt->bindParam(":estilo", $estilo, PDO::PARAM_STR);
        $stmt->bindParam(":precio_salida", $precio_salida, PDO::PARAM_STR);
        $stmt->bindParam(":num_registro", $num_registro, PDO::PARAM_STR);

        // Ejecutar la query
        if ($stmt->execute()) {
            return true;
        }
    }

    // Función editar
    public function editar($id_obra, $titulo, $id_artista, $estilo, $precio_salida, $num_registro) {
        // Crear la consulta SQL UPDATE
        $query = 'UPDATE ' . $this->table . ' 
                  SET titulo = :titulo, id_artista = :id_artista, estilo = :estilo, precio_salida = :precio_salida, num_registro = :num_registro 
                  WHERE id_obra = :id_obra';

        // Preparar la sentencia
        $stmt = $this->conn->prepare($query);

        // Vincular los parámetros
        $stmt->bindParam(':id_obra', $id_obra, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':id_artista', $id_artista, PDO::PARAM_INT);
        $stmt->bindParam(':estilo', $estilo, PDO::PARAM_STR);
        $stmt->bindParam(':precio_salida', $precio_salida, PDO::PARAM_STR);
        $stmt->bindParam(':num_registro', $num_registro, PDO::PARAM_STR);

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
