<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Up! Estudio Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <header data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
            <!-- Contenido del header aquí -->
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-gem"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6zm11.386 3.785-1.806-2.41-.776 2.413zm-3.633.004.961-2.989H4.186l.963 2.995zM5.47 5.495 8 13.366l2.532-7.876zm-1.371-.999-.78-2.422-1.818 2.425zM1.499 5.5l5.113 6.817-2.192-6.82zm7.889 6.817 5.123-6.83-2.928.002z" />
                    </svg>
                    <strong>UP! Estudio Store</strong>
                </a>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Vendedores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Marcas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="filtro-dapop.php"><button class="dropdown-item"
                                        type="button">Dapop</button></a></li>
                            <li><a class="dropdown-item" href="filtro-iwoo.php"><button class="dropdown-item"
                                        type="button">I'
                                        Woo</button></a></li>
                            <li><a class="dropdown-item" href="filtro-karite.php"><button class="dropdown-item"
                                        type="button">Karite</button></a></li>
                            <li><a class="dropdown-item" href="filtro-misslook.php"><button class="dropdown-item"
                                        type="button">Miss
                                        Look</button></a></li>
                            <li><a class="dropdown-item" href="filtro-moc.php"><button class="dropdown-item"
                                        type="button">Moc
                                        Allure</button></a></li>
                            <li><a class="dropdown-item" href="filtro-p21.php"><button class="dropdown-item"
                                        type="button">Pink
                                        21</button></a></li>
                            <li><a class="dropdown-item" href="filtro-pola-php"><button class="dropdown-item"
                                        type="button">Pola
                                        Aylr</button></a></li>
                            <li><a class="dropdown-item" href="filtro-ruby.php"><button class="dropdown-item"
                                        type="button">Ruby
                                        Rose</button></a></li>
                            <li><a class="dropdown-item" href="filtro-tejar.php"><button class="dropdown-item"
                                        type="button">Tejar</button></a></li>
                            <li><a class="dropdown-item" href="filtro-trendy.php"><button class="dropdown-item"
                                        type="button">Trendy</button></a></li>
                            <li><a class="dropdown-item" href="filtro-up.php"><button class="dropdown-item"
                                        type="button">UP</button></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false">Categorias</a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="accesorios.php">Accesorios</a></li>
                            <li><a class="dropdown-item" href="cejas.php">Cejas</a></li>
                            <li><a class="dropdown-item" href="labios.php">Labios</a></li>
                            <li><a class="dropdown-item" href="ojos.php">Ojos</a></li>
                            <li><a class="dropdown-item" href="pestanas.php">Pestañas</a></li>
                            <li><a class="dropdown-item" href="rostro.php">Rostro</a></li>
                            </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
   
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <?php
                    // Mostrar productos en la página principal
                    $conexion = mysqli_connect("127.0.0.1", "root", "");
                    mysqli_select_db($conexion, "c2640463_upestu");

                    $consulta = "SELECT * FROM productos WHERE marca = 'Moc Allure' ";
                    $datos = mysqli_query($conexion, $consulta);

                    while ($reg = mysqli_fetch_array($datos)) { ?>
                        <div class="col">
                            <div class="card">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="card-img-top" src="./<?php echo $reg['imagen']; ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="card-img-top" src="./<?php echo $reg['imagen_2']; ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h2 class="card-title" style="width: 100%; font-size:25px;">
                                        <?php echo ucwords($reg['articulo']) ?>
                                    </h2>
                                    <h3 class="card-title" style="width: 100%; font-size:25px;">
                                        <?php echo ucwords($reg['marca']) ?>
                                    </h3>
                                    <span>$ <?php echo $reg['precio']; ?></span>
                                    <a href="./productos.php?id=<?php echo $reg['id']; ?>"><button type="button"
                                            class="btn btn-outline-info">Info</button></a>
                                    <a href="https://wa.me/5492915784649?text=Hola,%20me%20gustaría%20comprar%20la%20<?php echo urlencode($reg['articulo']); ?>"
                                        target="_blank"><button type="button"
                                            class="btn btn-outline-success">Comprar</button></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($conexion);
                    ?>

                </div>
            </div>
        </div>

    </main>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                    href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>