<?php
 $conexion = mysqli_connect("127.0.0.1", "root", "");
 mysqli_select_db($conexion, "c2640463_upestu");

$id = $_GET['id'];

$consulta = "SELECT * FROM productos WHERE id = $id";
$respuesta = mysqli_query($conexion, $consulta);

$datos = mysqli_fetch_array($respuesta);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilos.css">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <main class="mt-5">
        <?php
        $articulo = $datos['articulo'];
        $marca = $datos['marca'];
        $precio = $datos['precio'];
        $pago = $datos['pago'];
        $imagen = $datos['imagen'];
        $imagen_2 = $datos['imagen_2'];
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="./<?php echo $imagen; ?>" class="img-fluid mb-2" alt="..." width = "500px">
                    <img src="./<?php echo $imagen_2; ?>" class="img-fluid" alt="..." width = "500px">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $articulo; ?></h3>
                        <h4 class="card-text"><?php echo $marca; ?></h4>
                        <h5 class="card-text"><?php echo $precio; ?></h5>
                        <a href="./pago-confirmado.html"><button type="button"
                                class="btn btn-outline-success">Pagar</button></a>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>