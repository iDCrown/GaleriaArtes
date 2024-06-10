<?php include("../includes/header.php") ?>
<?php include_once("../models/articulo.php") ?>

<?php
    // Instanciar base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    //Validar si se envío el id
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    //Instanciar el objeto
    $articulos = new Articulo($db);
    $resultado = $articulos->leer_individual($id);

    if (isset($_POST['editarArticulo'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
    
        // Procesar la imagen
        if ($_FILES['imagen']['size'] > 0) {
            $imagen_nombre = $_FILES['imagen']['name'];
            $imagen_temp = $_FILES['imagen']['tmp_name'];
            $imagen_tipo = $_FILES['imagen']['type'];
    
            // Validar el tipo de imagen
            if ($imagen_tipo == "image/jpeg" || $imagen_tipo == "image/png" || $imagen_tipo == "image/gif") {
                // Guardar la imagen en el directorio de imágenes
                $rutaImagen = "../img/articulos/" . $imagen_nombre;
                move_uploaded_file($imagen_temp, $rutaImagen);
            } else {
                $error = "Error: El formato de la imagen no es válido.";
            }
        } else {
            // Si no se proporciona una nueva imagen, mantener la imagen actual
            $rutaImagen = $resultado->imagen;
        }
    
        // Actualizar el artículo en la base de datos
        if ($articulos->editar($id, $titulo, $rutaImagen, $texto)) {
            // Redirigir a la página de éxito
            header("Location: articulos.php?id=$id&mensaje=Artículo editado correctamente");
            exit();
        } else {
            // Mostrar un mensaje de error
            $error = "Error al editar el artículo";
        }
    }
?>

<div class="row">
    
    </div>

<div class="row">
        <div class="col-sm-6">
            <h3>Editar Artículo</h3>
        </div>            
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
        <form method="POST" action=" " enctype="multipart/form-data">

            <input type="hidden" name="id" value="4">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $resultado->titulo; ?>">               
            </div>

            <div class="mb-3">
				<img class="img-fluid" src="<?php echo  "../img/articulos/" . $resultado->imagen; ?>" style="width:180px;">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Selecciona una imagen">               
            </div>
            <div class="mb-3">
                <label for="texto">Texto</label>   
                <textarea class="form-control" placeholder="Escriba el texto de su artículo" name="texto" style="height: 200px">
                <?php echo $resultado->texto; ?>
                </textarea>              
            </div>          
        
            <br />
            <button type="submit" name="editarArticulo" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar Artículo</button>

            <button type="submit" name="borrarArticulo" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Borrar Artículo</button>
            </form>
        </div>
    </div>
<?php include("../includes/footer.php") ?>