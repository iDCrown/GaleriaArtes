<?php include("../includes/header.php") ?>
<?php include_once("../models/obra.php") ?>

<?php
    // Instanciar base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    // Validar si se envió el id
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    // Instanciar el objeto
    $obras = new Obra($db);
    $resultado = $obras->leer_individual($id);

    if (isset($_POST['editarObra'])) {
        $id_obra = $_POST['id_obra'];
        $titulo = $_POST['titulo'];
        $id_artista = $_POST['id_artista'];
        $estilo = $_POST['estilo'];
        $precio_salida = $_POST['precio_salida'];
        $num_registro = $_POST['num_registro'];
    
        // Actualizar la obra en la base de datos
        if ($obras->editar($id_obra, $titulo, $id_artista, $estilo, $precio_salida, $num_registro)) {
            // Redirigir a la página de éxito
            header("Location: obras.php?id=$id_obra&mensaje=Obra editada correctamente");
            exit();
        } else {
            // Mostrar un mensaje de error
            $error = "Error al editar la obra";
        }
    }

    // Obtener la lista de artistas para el formulario
    $queryArtistas = 'SELECT id_artista, nombre FROM artistas';
    $stmtArtistas = $db->prepare($queryArtistas);
    $stmtArtistas->execute();
    $artistas = $stmtArtistas->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($error)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
        </div>
        <?php endif;?>
    </div>       
</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Editar Obra</h3>
    </div>            
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="">
            <input type="hidden" name="id_obra" value="<?php echo $resultado->id_obra; ?>">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $resultado->titulo; ?>">               
            </div>
            <div class="mb-3">
                <label for="id_artista" class="form-label">Artista:</label>
                <select class="form-control" name="id_artista" id="id_artista">
                    <?php foreach ($artistas as $artista) : ?>
                        <option value="<?php echo $artista->id_artista; ?>" <?php echo ($artista->id_artista == $resultado->id_artista) ? 'selected' : ''; ?>>
                            <?php echo $artista->nombre; ?>
                        </option>
                    <?php endforeach; ?>
                </select>             
            </div>
            <div class="mb-3">
                <label for="estilo" class="form-label">Estilo:</label>
                <input type="text" class="form-control" name="estilo" id="estilo" value="<?php echo $resultado->estilo; ?>">               
            </div>
            <div class="mb-3">
                <label for="precio_salida" class="form-label">Precio de Salida:</label>
                <input type="number" step="0.01" class="form-control" name="precio_salida" id="precio_salida" value="<?php echo $resultado->precio_salida; ?>">               
            </div>
            <div class="mb-3">
                <label for="num_registro" class="form-label">Número de Registro:</label>
                <input type="text" class="form-control" name="num_registro" id="num_registro" value="<?php echo $resultado->num_registro; ?>">               
            </div>         
        
            <br />
            <button type="submit" name="editarObra" class="btn btn-success w-100"><i class="bi bi-person-bounding-box"></i> Editar Obra</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>
