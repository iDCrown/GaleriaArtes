<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap-icons-1.2.1/font/bootstrap-icons.css">

    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">

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
                            <a class="dropdown-item" href="admin/obras.php">Obras de arte</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="admin/artistas.php">Artistas</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="admin/compradores.php">Compradores</a>
                            </li>
                            </li>                        
                            <li>
                            <a class="dropdown-item" href="admin/ofertas.php">Ofertas</a>
                            </li>                        
                        </ul>

                    </li>
                </ul>  
  
            </div>
        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../galeriaArte/img/slides/Gio.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block caja2">
        <h5>LA GIOCONDA</h5>
        <p>Obra de arte del Italiano Leonardo da Vinvi</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../galeriaArte/img/slides/starry.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block caja2" >
        <h5>THE STARRY NIGHT O LA NOCHE ESTRELLADA</h5>
        <p>Obra de arte del neerlandes Vincent van Gogh</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../galeriaArte/img/slides/cena.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block caja2">
        <h5>LA ÚLTIMA CENA</h5>
        <p>Obra de arte del Italiano Leonardo da Vinci y restaurada por Enrique Cabrera</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

    <div class="container mt-5">
