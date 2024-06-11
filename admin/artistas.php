
<?php include("../includes/header.php") ?>

<?php
$database = new Basemysql();
$db = $database->connect();

$artista = new Artista($db);
$resultado = $artista->leer();
?>



<div class="row">
    <div class="col">
        <h2>Lista de Artistas</h2>
        <a href="crear_artista.php" class="btn btn-primary mb-3">Agregar Artista</a>
        <table class="table table-bordered" id="tablaArtistas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id_artista']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['correo_electronico']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td>
                            <a href="editar_artista.php?id=<?php echo $row['id_artista']; ?>" class="btn btn-warning">Editar</a>
                            <a href="borrar_artista.php?id=<?php echo $row['id_artista']; ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../includes/footer.php") ?>
