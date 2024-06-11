<?php include("../includes/header.php") ?>

<?php
$database = new Basemysql();
$db = $database->connect();

$comprador = new Comprador($db);
$resultado = $comprador->leer();
?>

<div class="row">
    <div class="col">
        <h2>Lista de Compradores</h2>
        <a href="crear_comprador.php" class="btn btn-primary mb-3">Agregar Comprador</a>
        <table class="table table-bordered" id="tablaCompradores">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id_comprador']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['correo_electronico']; ?></td>
                        <td>
                            <a href="editar_comprador.php?id=<?php echo $row['id_comprador']; ?>" class="btn btn-warning">Editar</a>
                            <a href="borrar_comprador.php?id=<?php echo $row['id_comprador']; ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../includes/footer.php") ?>
