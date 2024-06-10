<?php include("../includes/header.php") ?>
<?php
    //instanciar base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    if (isset($_POST['crearArticulo'])){
        $titulo = $_POST["titulo"];
        $texto = $_POST["texto"];

        if ($_FILES["imagen"]["error"] > 0){
            $error = "Error, ningún archivo seleccionado";
        }else{
            //Esta instrucción ocurre ya que la imagen se subio correctamente
            //Validemos que el resto de campos estan llenos
            if (empty($titulo) || $titulo == '' || empty($texto) || $texto == ''){
                $error = "Completa todos los campos";
            }else{
                //Ocurre esta instrucción una vez todos los campos fueron llenados correctamente
                //Subamos el archivo
                $image = $_FILES['imagen']['name'];
                $imageArr = explode('.', $image);
                $rand = rand(1000, 99999);
                $newImageName = $imageArr[0] . $rand . '.' . $imageArr[1];
                $rutaFinal = "../img/articulos/" . $newImageName;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal);

                //Instanciando el articulo
                $articulo = new Articulo($db);

                if ($articulo->crear($titulo, $newImageName, $texto)){
                    $mensaje = "Articulo creado corectamente";
                    header("Location:articulos.php?mensaje=" . urlencode($mensaje));
                }
            } 
        }
    }
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
            <h3>Crear un Nuevo Artículo</h3>
        </div>            
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingresa el título">               
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="apellidos" placeholder="Selecciona una imagen">               
            </div>
            <div class="mb-3">
                <label for="texto">Texto</label>   
                <textarea class="form-control" placeholder="Escriba el texto de su artículo" name="texto" style="height: 200px"></textarea>              
            </div>          
        
            <br />
            <button type="submit" name="crearArticulo" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Crear Nuevo Artículo</button>
            </form>
        </div>
    </div>
<?php include("../includes/footer.php") ?>
       