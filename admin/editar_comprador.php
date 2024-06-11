<?php include("../includes/header.php") ?>
<?php include("../models/comprador.php") ?>

<?php
$database = new Basemysql();
$db = $database->connect();

$comprador = new Comprador($db);

if (isset($_GET['id'])) {
    $comprador->id_comprador = $_GET['id'];
    $resultado = $comprador->leer_uno();
    $row = $resultado->fetch(PDO::FETCH_ASSOC);

    $comprador->nombre = $row['nombre'];
    $comprador->correo_electronico = $row['correo_electronico'];
}

if ($_POST) {
    $comprador->id_comprador = $_POST['id_comprador'];
    $comprador->nombre = $_POST['nombre'];
    $comprador->correo_electronico = $_POST['correo_electronico'];

    if ($comprador->actualizar()) {
        echo "<div class='alert alert-success'>El comprador fue actualizado.</div>";
    } else {
        echo "<div class='alert alert-danger'>No se pudo actualizar el comprador.</div>";
    }
}
?>

<div class="row">
    <div class="col">
        <h2>Editar Comprador</h2>
        <form action="editar_comprador.php?id=<?php echo $comprador->id_comprador; ?>" method="post">
            <input type="hidden" name="id_comprador" value="<?php echo $comprador->id_comprador; ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $comprador->nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" class="form-control" name="correo_electronico" value="<?php echo $comprador->correo_electronico; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </div>
</div>

<?php include("../includes/footer.php") ?>
