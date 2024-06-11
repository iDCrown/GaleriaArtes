<?php
class Oferta {
    private $conn;
    private $table = "ofertas";

    public $id_oferta;
    public $id_obra;
    public $id_comprador;
    public $precio_propuesto;
    public $fecha_realizacion;
    public $estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function leer() {
        $query = "SELECT o.id_oferta, o.id_obra, o.id_comprador, o.precio_propuesto, o.fecha_realizacion, o.estado, 
                          CONCAT(a.titulo, ' (ID: ', o.id_obra, ')') AS obra, 
                          CONCAT(c.nombre, ' (ID: ', o.id_comprador, ')') AS comprador
                  FROM " . $this->table . " o
                  LEFT JOIN obras_arte a ON o.id_obra = a.id_obra
                  LEFT JOIN compradores c ON o.id_comprador = c.id_comprador
                  ORDER BY o.id_oferta DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table . " SET id_obra=:id_obra, id_comprador=:id_comprador, precio_propuesto=:precio_propuesto, fecha_realizacion=:fecha_realizacion, estado=:estado";
        $stmt = $this->conn->prepare($query);

        $this->id_obra = htmlspecialchars(strip_tags($this->id_obra));
        $this->id_comprador = htmlspecialchars(strip_tags($this->id_comprador));
        $this->precio_propuesto = htmlspecialchars(strip_tags($this->precio_propuesto));
        $this->fecha_realizacion = htmlspecialchars(strip_tags($this->fecha_realizacion));
        $this->estado = htmlspecialchars(strip_tags($this->estado));

        $stmt->bindParam(":id_obra", $this->id_obra);
        $stmt->bindParam(":id_comprador", $this->id_comprador);
        $stmt->bindParam(":precio_propuesto", $this->precio_propuesto);
        $stmt->bindParam(":fecha_realizacion", $this->fecha_realizacion);
        $stmt->bindParam(":estado", $this->estado);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function actualizar() {
        $query = "UPDATE " . $this->table . " SET id_obra=:id_obra, id_comprador=:id_comprador, precio_propuesto=:precio_propuesto, fecha_realizacion=:fecha_realizacion, estado=:estado WHERE id_oferta=:id_oferta";
        $stmt = $this->conn->prepare($query);

        $this->id_obra = htmlspecialchars(strip_tags($this->id_obra));
        $this->id_comprador = htmlspecialchars(strip_tags($this->id_comprador));
        $this->precio_propuesto = htmlspecialchars(strip_tags($this->precio_propuesto));
        $this->fecha_realizacion = htmlspecialchars(strip_tags($this->fecha_realizacion));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->id_oferta = htmlspecialchars(strip_tags($this->id_oferta));

        $stmt->bindParam(":id_obra", $this->id_obra);
        $stmt->bindParam(":id_comprador", $this->id_comprador);
        $stmt->bindParam(":precio_propuesto", $this->precio_propuesto);
        $stmt->bindParam(":fecha_realizacion", $this->fecha_realizacion);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":id_oferta", $this->id_oferta);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function borrar() {
        $query = "DELETE FROM " . $this->table . " WHERE id_oferta=:id_oferta";
        $stmt = $this->conn->prepare($query);

        $this->id_oferta = htmlspecialchars(strip_tags($this->id_oferta));
        $stmt->bindParam(":id_oferta", $this->id_oferta);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
