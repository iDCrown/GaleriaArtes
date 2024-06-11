<?php
class Artista {
    private $conn;
    private $table = "artistas";

    public $id_artista;
    public $nombre;
    public $correo_electronico;
    public $direccion;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function leer() {
        $query = "SELECT id_artista, nombre, correo_electronico, direccion FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table . " SET nombre=:nombre, correo_electronico=:correo_electronico, direccion=:direccion";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo_electronico = htmlspecialchars(strip_tags($this->correo_electronico));
        $this->direccion = htmlspecialchars(strip_tags($this->direccion));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":correo_electronico", $this->correo_electronico);
        $stmt->bindParam(":direccion", $this->direccion);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function actualizar() {
        $query = "UPDATE " . $this->table . " SET nombre=:nombre, correo_electronico=:correo_electronico, direccion=:direccion WHERE id_artista=:id_artista";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo_electronico = htmlspecialchars(strip_tags($this->correo_electronico));
        $this->direccion = htmlspecialchars(strip_tags($this->direccion));
        $this->id_artista = htmlspecialchars(strip_tags($this->id_artista));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":correo_electronico", $this->correo_electronico);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":id_artista", $this->id_artista);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function borrar() {
        $query = "DELETE FROM " . $this->table . " WHERE id_artista=:id_artista";
        $stmt = $this->conn->prepare($query);

        $this->id_artista = htmlspecialchars(strip_tags($this->id_artista));
        $stmt->bindParam(":id_artista", $this->id_artista);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
