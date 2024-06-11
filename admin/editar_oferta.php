<?php include("../includes/header.php") ?>

<?php
$database = new Basemysql();
$db = $database->connect();

$oferta = new Oferta($db);

if (isset($_GET['id'])) {
    $oferta->id_oferta = $_GET['id'];
    $resultado = $oferta->leer();
    $row = $resultado->fetch(PDO::FETCH_ASSOC);

    $oferta->id_obra = $row['id_obra'];
    $oferta->id_comprador = $row['id_comprador'];
    $oferta->precio_propuesto = $row['precio_propuesto'];
    $oferta->fecha_realizacion = $row['fecha_realizacion'];
    $oferta->estado = $row['estado'];
}

if ($_POST) {
    $oferta->id_oferta = $_POST['id_oferta'];
    $oferta->id_obra = $_POST['id_obra'];
    $oferta->id_comprador = $_POST['id_comprador'];
    $oferta->precio_propuesto = $_POST['precio_propuesto'];
    $oferta->fecha_realizacion = $_POST['fecha_realizacion'];
    $oferta->estado = $_POST['estado'];

    if ($oferta->actualizar()) {
        echo "<div class='alert alert-success'>La oferta fue actualizada.</div>";
    } else {
        echo "<div class='alert alert-danger'>No se pudo actualizar la oferta.</div>";
    }
}
?>

<div class="row">
    <div class="col">
        <h2>Editar Oferta</h2>
        <form action="editar_oferta.php?id=<?php echo $oferta->id_oferta; ?>" method="post">
            <input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta; ?>">
            <div class="form-group">
                <label for="id_obra">ID de Obra</label>
                <input type="number" class="form-control" name="id_obra" value="<?php echo $oferta->id_obra; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_comprador">ID de Comprador</label>
                <input type="number" class="form-control" name="id_comprador" value="<?php echo $oferta->id_comprador; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio_propuesto">Precio Propuesto</label>
                <input type="text" class="form-control" name="precio_propuesto" value="<?php echo $oferta->precio_propuesto; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_realizacion">Fecha Realización</label>
                <input type="date" class="form-control" name="fecha_realizacion" value="<?php echo $oferta->fecha_realizacion; ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" required>
                    <option value="pendiente" <?php if ($oferta->estado == 'pendiente') echo 'selected'; ?>>Pendiente</option>
                    <option value="aceptada" <?php if ($oferta->estado == 'aceptada') echo 'selected'; ?>>Aceptada</option>
                    <option value="rechazada" <?php if ($oferta->estado == 'rechazada') echo 'selected'; ?>>Rechazada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </div>
</div>

<?php include("../includes/footer.php") ?>
