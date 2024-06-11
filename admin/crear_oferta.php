<?php include("../includes/header.php") ?>

<?php
$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$oferta = new Oferta($db);

if ($_POST) {
    $oferta->id_obra = $_POST['id_obra'];
    $oferta->id_comprador = $_POST['id_comprador'];
    $oferta->precio_propuesto = $_POST['precio_propuesto'];
    $oferta->fecha_realizacion = $_POST['fecha_realizacion'];
    $oferta->estado = $_POST['estado'];

    if ($oferta->crear()) {
        echo "<div class='alert alert-success'>La oferta fue creada.</div>";
    } else {
        echo "<div class='alert alert-danger'>No se pudo crear la oferta.</div>";
    }
}
?>

<div class="row">
    <div class="col">
        <h2>Agregar Oferta</h2>
        <form action="crear_oferta.php" method="post">
            <div class="form-group">
                <label for="id_obra">ID de Obra</label>
                <input type="number" class="form-control" name="id_obra" required>
            </div>
            <div class="form-group">
                <label for="id_comprador">ID de Comprador</label>
                <input type="number" class="form-control" name="id_comprador" required>
            </div>
            <div class="form-group">
                <label for="precio_propuesto">Precio Propuesto</label>
                <input type="text" class="form-control" name="precio_propuesto" required>
            </div>
            <div class="form-group">
                <label for="fecha_realizacion">Fecha Realización</label>
                <input type="date" class="form-control" name="fecha_realizacion" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="aceptada">Aceptada</option>
                    <option value="rechazada">Rechazada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</div>

<?php include("../includes/footer.php") ?>
