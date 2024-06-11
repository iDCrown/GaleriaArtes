<?php include("../includes/header.php") ?>

<?php
$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$comprador = new Comprador($db);

if ($_POST) {
    $comprador->nombre = $_POST['nombre'];
    $comprador->correo_electronico = $_POST['correo_electronico'];

    if ($comprador->crear()) {
        echo "<div class='alert alert-success'>El comprador fue creado.</div>";
    } else {
        echo "<div class='alert alert-danger'>No se pudo crear el comprador.</div>";
    }
}
?>

<div class="row">
    <div class="col">
        <h2>Agregar Comprador</h2>
        <form action="crear_comprador.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" class="form-control" name="correo_electronico" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</div>

<?php include("../includes/footer.php") ?>
