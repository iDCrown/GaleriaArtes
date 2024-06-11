<?php include("../includes/header.php") ?>
<?php include("../models/artista.php") ?>

<?php
$database = new Basemysql();
$db = $database->connect();

$artista = new Artista($db);

if (isset($_GET['id'])) {
    $artista->id_artista = $_GET['id'];
    $resultado = $artista->leer_uno();
    $row = $resultado->fetch(PDO::FETCH_ASSOC);

    $artista->nombre = $row['nombre'];
    $artista->correo_electronico = $row['correo_electronico'];
    $artista->direccion = $row['direccion'];
}

if ($_POST) {
    $artista->id_artista = $_POST['id_artista'];
    $artista->nombre = $_POST['nombre'];
    $artista->correo_electronico = $_POST['correo_electronico'];
    $artista->direccion = $_POST['direccion'];

    if ($artista->actualizar()) {
        echo "<div class='alert alert-success'>El artista fue actualizado.</div>";
    } else {
        echo "<div class='alert alert-danger'>No se pudo actualizar el artista.</div>";
    }
}
?>

<?php include("../template/header.php") ?>

<div class="row">
    <div class="col">
        <h2>Editar Artista</h2>
        <form action="editar_artista.php?id=<?php echo $artista->id_artista; ?>" method="post">
            <input type="hidden" name="id_artista" value="<?php echo $artista->id_artista; ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $artista->nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" class="form-control" name="correo_electronico" value="<?php echo $artista->correo_electronico; ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $artista->direccion; ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </div>
</div>

<?php include("../template/footer.php") ?>
