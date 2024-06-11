<?php include("../includes/header.php") ?>

<?php
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    $obras = new Obra($db);
    $resultado = $obras->leer();
?>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_GET['mensaje'])) :?>
        <div class="alert alert-success alert-disimissible fade show" role="alert">
            <strong><?php echo $_GET['mensaje'];?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"> </button>
        </div>
        <?php endif;?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Lista de Obras</h3>
    </div> 
    <div class="col-sm-4 offset-2">
        <a href="crear_obra.php" class="btn btn-success w-100"><i class="bi bi-plus-circle-fill"></i> Nueva Obra</a>
    </div>    
</div>
<div class="row mt-2 caja">
    <div class="col-sm-12">
            <table id="tblObras" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Artista</th> 
                        <th>Estilo</th>
                        <th>Precio de Salida</th>              
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($resultado as $obra) : ?>
            
                    <tr>
                        <td><?php echo $obra->id_obra; ?></td>
                        <td><?php echo $obra->titulo; ?></td>
                        <td><?php echo $obra->nombre_artista; ?></td>
                        <td><?php echo $obra->estilo;?></td>
                        <td><?php echo $obra->precio_salida;?></td>                      
                        <td>
                        <a href="editar_obra.php?id=<?php echo $obra->id_obra;?>"  class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>                       
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>       
            </table>
    </div>
</div>
<?php include("../includes/footer.php") ?>

<script>
    $(document).ready( function () {
        $('#tblObras').DataTable();
    });
</script>
