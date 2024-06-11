<?php include("../config/Basemysql.php")?>
<?php include("../config/config.php")?>
<?php include("../models/obra.php")?>
<?php include("../models/artista.php")?>
<?php include("../models/comprador.php")?>
<?php include("../models/oferta.php")?>

<!doctype html>
<html lang="es">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/bootstrap-icons-1.2.1/font/bootstrap-icons.css">

    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">    

    <link rel="stylesheet" href="../css/estilos.css">

    <title>Galería de arte</title>
    </head>
    <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Galería de arte</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                
            

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Registros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                            <a class="dropdown-item" href="obras.php">Obras de arte</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="artistas.php">Artistas</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="compradores.php">Compradores</a>
                            </li>                        
                            <li>
                            <a class="dropdown-item" href="ofertas.php">Ofertas</a>
                            </li>                        
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
    <div class="container mt-5 caja">
