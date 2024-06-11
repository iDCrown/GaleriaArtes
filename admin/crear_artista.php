<?php include("../includes/header.php") ?>

<?php
$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$artista = new Artista($db);

if ($_POST) {
    $artista->nombre = $_POST['nombre'];
    $artista->correo_electronico = $_POST['correo_electronico'];
    $artista->direccion = $_POST['direccion'];

    if ($artista->crear()) {
        echo "<div class='alert alert-success'>El artista fue creado.</div>";
    } else {
        echo "<div class='alert alert-danger'>No se pudo crear el artista.</div>";
    }
}
?>


<div class="row">
    <div class="col">
        <h2>Agregar Artista</h2>
        <form action="crear_artista.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" class="form-control" name="correo_electronico" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</div>

<?php include("../includes/footer.php") ?>
