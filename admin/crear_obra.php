<?php include("../includes/header.php") ?>
<?php
    //instanciar base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    if (isset($_POST['crearObra'])){
        $titulo = $_POST["titulo"];
        $id_artista = $_POST["id_artista"];
        $estilo = $_POST["estilo"];
        $precio_salida = $_POST["precio_salida"];
        $num_registro = $_POST["num_registro"];

        // Validar que todos los campos están llenos
        if (empty($titulo) || $titulo == '' || empty($id_artista) || empty($estilo) || empty($precio_salida) || empty($num_registro)){
            $error = "Completa todos los campos";
        } else {
            // Instanciando la obra
            $obra = new Obra($db);

            if ($obra->crear($titulo, $id_artista, $estilo, $precio_salida, $num_registro)){
                $mensaje = "Obra creada correctamente";
                header("Location: obras.php?mensaje=" . urlencode($mensaje));
            }
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
        <h3>Crear una Nueva Obra</h3>
    </div>            
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingresa el título">               
            </div>
            <div class="mb-3">
                <label for="id_artista" class="form-label">Artista:</label>
                <select class="form-control" name="id_artista" id="id_artista">
                    <?php foreach ($artistas as $artista) : ?>
                        <option value="<?php echo $artista->id_artista; ?>"><?php echo $artista->nombre; ?></option>
                    <?php endforeach; ?>
                </select>             
            </div>
            <div class="mb-3">
                <label for="estilo" class="form-label">Estilo:</label>
                <input type="text" class="form-control" name="estilo" id="estilo" placeholder="Ingresa el estilo">               
            </div>
            <div class="mb-3">
                <label for="precio_salida" class="form-label">Precio de Salida:</label>
                <input type="number" step="0.01" class="form-control" name="precio_salida" id="precio_salida" placeholder="Ingresa el precio de salida">               
            </div>
            <div class="mb-3">
                <label for="num_registro" class="form-label">Número de Registro:</label>
                <input type="text" class="form-control" name="num_registro" id="num_registro" placeholder="Ingresa el número de registro">               
            </div>         
        
            <br />
            <button type="submit" name="crearObra" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Crear Nueva Obra</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>
