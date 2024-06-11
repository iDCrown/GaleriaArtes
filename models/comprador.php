<?php
class Comprador {
    private $conn;
    private $table = "compradores";

    public $id_comprador;
    public $nombre;
    public $correo_electronico;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function leer() {
        $query = "SELECT id_comprador, nombre, correo_electronico FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table . " SET nombre=:nombre, correo_electronico=:correo_electronico";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo_electronico = htmlspecialchars(strip_tags($this->correo_electronico));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":correo_electronico", $this->correo_electronico);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function actualizar() {
        $query = "UPDATE " . $this->table . " SET nombre=:nombre, correo_electronico=:correo_electronico WHERE id_comprador=:id_comprador";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo_electronico = htmlspecialchars(strip_tags($this->correo_electronico));
        $this->id_comprador = htmlspecialchars(strip_tags($this->id_comprador));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":correo_electronico", $this->correo_electronico);
        $stmt->bindParam(":id_comprador", $this->id_comprador);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function borrar() {
        $query = "DELETE FROM " . $this->table . " WHERE id_comprador=:id_comprador";
        $stmt = $this->conn->prepare($query);

        $this->id_comprador = htmlspecialchars(strip_tags($this->id_comprador));
        $stmt->bindParam(":id_comprador", $this->id_comprador);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function leer_uno() {
        $query = "SELECT nombre, correo_electronico FROM " . $this->table . " WHERE id_comprador = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_comprador);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nombre = $row['nombre'];
        $this->correo_electronico = $row['correo_electronico'];
    }
}
?>
