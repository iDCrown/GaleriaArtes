<?php include("../includes/header.php") ?>

<?php
$database = new Basemysql();
$db = $database->connect();

$oferta = new Oferta($db);
$resultado = $oferta->leer();
?>

<div class="row">
    <div class="col">
        <h2>Lista de Ofertas</h2>
        <a href="crear_oferta.php" class="btn btn-primary mb-3">Agregar Oferta</a>
        <table class="table table-bordered" id="tablaOfertas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Obra</th>
                    <th>Comprador</th>
                    <th>Precio Propuesto</th>
                    <th>Fecha Realización</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id_oferta']; ?></td>
                        <td><?php echo $row['obra']; ?></td>
                        <td><?php echo $row['comprador']; ?></td>
                        <td><?php echo $row['precio_propuesto']; ?></td>
                        <td><?php echo $row['fecha_realizacion']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td>
                            <a href="editar_oferta.php?id=<?php echo $row['id_oferta']; ?>" class="btn btn-warning">Editar</a>
                            <a href="borrar_oferta.php?id=<?php echo $row['id_oferta']; ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../includes/footer.php") ?>
