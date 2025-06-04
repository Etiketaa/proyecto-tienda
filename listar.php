<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1>Tienda</h1>
    </header>
    <nav class="nav">
        <a class="nav-link active" aria-current="page" href="index.php"><button type="button"
                class="btn btn-outline-warning">Home</button></a>
        <a class="nav-link" href="listar.php"><button type="button" class="btn btn-outline-warning">Lista de
                articulos</button></a>
        <a class="nav-link" href="agregar.html"><button type="button" class="btn btn-outline-warning">Agregar
                articulo</button></a>
    </nav>
    <main>
        <h2>Lista de Artículos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Articulo</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Imagen 2</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = mysqli_connect("127.0.0.1", "root", "");
                mysqli_select_db($conexion, "c2640463_upestu");
                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                $consulta = "SELECT * FROM productos";
                $datos = mysqli_query($conexion, $consulta);

                while ($reg = mysqli_fetch_array($datos)) { ?>
                    <tr>
                        <td><?php echo $reg['id']; ?></td>
                        <td><?php echo $reg['articulo']; ?></td>
                        <td><?php echo $reg['marca']; ?></td>
                        <td><?php echo $reg['categoria']; ?></td>
                        <td><?php echo $reg['precio']; ?></td>
                        <td><img src="./<?php echo $reg['imagen'] ?>" alt="" width="100px" height="100px"></td>
                        <td><img src="./<?php echo $reg['imagen_2'] ?>" alt="" width="100px" height="100px"></td>
                        <td><a href="editar.php?id=<?php echo $reg['id']; ?>">Editar</a></td>
                        <td><a href="borrar.php?id=<?php echo $reg['id']; ?>">Borrar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>