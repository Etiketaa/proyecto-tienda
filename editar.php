<?php
// 1) Conexión
$conexion = mysqli_connect("127.0.0.1", "root", "");
                mysqli_select_db($conexion, "c2640463_upestu");

// Si se envió el formulario para guardar cambios
if (isset($_POST['guardar_cambios'])) {
    // Almacenamos el ID del artículo a editar del envío GET
    $id = $_GET['id'];

    // 2') Almacenamos los datos actualizados del envío POST
    $articulo = $_POST['articulo'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];

    // carpeta para guardar imágenes
    $target_dir = "uploads/";

    // Inicializar la variable de control de subida, si está en 1 está ok si llega en 0 daría el error
    $uploadOk = 1;

    // Verificar y subir la primera imagen si se ha seleccionado
    if (!empty($_FILES["imagen"]["tmp_name"])) {
        $target_file1 = $target_dir . basename($_FILES["imagen"]["name"]);
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        if (getimagesize($_FILES["imagen"]["tmp_name"]) === false) {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        } elseif (!in_array($imageFileType1, ["jpg", "jpeg", "png", "gif"])) {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        } elseif (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file1)) {
            echo "Error al subir la imagen.";
            $uploadOk = 0;
        }
    } else {
        // Recuperar la imagen actual del artículo si no se subió una nueva imagen
        $consulta = "SELECT imagen FROM productos WHERE id=$id";
        $respuesta = mysqli_query($conexion, $consulta);
        $datos = mysqli_fetch_array($respuesta);
        $target_file1 = $datos['imagen'];
    }

    // Verificar y subir la segunda imagen si se ha seleccionado
    if (!empty($_FILES["imagen2"]["tmp_name"])) {
        $target_file2 = $target_dir . basename($_FILES["imagen2"]["name"]);
        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
        if (getimagesize($_FILES["imagen2"]["tmp_name"]) === false) {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        } elseif (!in_array($imageFileType2, ["jpg", "jpeg", "png", "gif"])) {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        } elseif (!move_uploaded_file($_FILES["imagen2"]["tmp_name"], $target_file2)) {
            echo "Error al subir la imagen.";
            $uploadOk = 0;
        }
    } else {
        // Recuperar la segunda imagen actual del artículo si no se subió una nueva imagen
        $consulta = "SELECT imagen_2 FROM productos WHERE id=$id";
        $respuesta = mysqli_query($conexion, $consulta);
        $datos = mysqli_fetch_array($respuesta);
        $target_file2 = $datos['imagen_2'];
    }

    // Verificar que todos los campos obligatorios tienen valor y no hubo errores al subir las imágenes
    if ($articulo && $marca && $categoria && $precio && $uploadOk) {
        // Preparar la consulta SQL
        $consulta_actualizacion = "UPDATE productos SET articulo='$articulo', marca='$marca', categoria='$categoria', precio='$precio', imagen='$target_file1', imagen_2='$target_file2' WHERE id=$id";
        // Ejecutar la orden y actualizar los datos
        if (mysqli_query($conexion, $consulta_actualizacion)) {
            // Redirigir a la página de listar después de la actualización exitosa
            header('Location: listar.php');
            exit;
        } else {
            // Manejar error en la actualización
            die("Error al actualizar los datos: " . mysqli_error($conexion));
        }
    } else {
        echo "Error: Todos los campos son obligatorios y deben ser válidos.";
    }
}

// 2) Almacenamos el ID del artículo a editar del envío GET
$id = $_GET['id'];

// 3) Preparar la consulta SQL para obtener los datos del artículo a editar
$consulta = "SELECT * FROM productos WHERE id=$id";
$respuesta = mysqli_query($conexion, $consulta);

// 4) Verificar si se encontró el registro y obtener los datos
if ($datos = mysqli_fetch_array($respuesta)) {
    $articulo = $datos["articulo"];
    $marca = $datos["marca"];
    $categoria = $datos["categoria"];
    $precio = $datos["precio"];
    $imagen = $datos['imagen'];
    $imagen_2 = $datos['imagen_2'];
} else {
    die("El artículo con ID $id no fue encontrado.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h2>Editar Artículo</h2>
    </header>

    <nav class="nav">
        <a class="nav-link active" aria-current="page" href="index.php"><button type="button"
                class="btn btn-outline-warning">Home</button></a>
        <a class="nav-link" href="listar.php"><button type="button" class="btn btn-outline-warning">Lista de
                Artículos</button></a>
        <a class="nav-link" href="agregar.html"><button type="button" class="btn btn-outline-warning">Agregar
                Artículo</button></a>
    </nav>

    <p>Ingrese los nuevos datos del artículo.</p>

    <form action="editar.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <label for="">Tipo de Artículo</label>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Artículo</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="articulo" placeholder="Ej. Remera, Buzo, etc." required
                value="<?php echo $articulo; ?>">
        </div>
        <label for="">Marca</label>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Marca</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="marca" placeholder="Ej. Nike, Adidas, etc" required
                value="<?php echo $marca; ?>">
        </div>
        <label for="">Categoría</label>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Categoría</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="categoria" placeholder="Ej. Urbano, Deportivo, etc."
                required value="<?php echo $categoria; ?>">
        </div>
        <label for="">Precio</label>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Precio</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="precio" placeholder="Ej. 2300" required
                value="<?php echo $precio; ?>">
        </div>
        <label for="">Imagen</label>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Imagen</span>
            <input type="file" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="imagen">
        </div>
        <label for="">Imagen 2</label>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Imagen 2</span>
            <input type="file" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" name="imagen2">
        </div>

        <!-- Mostrar las imágenes actuales -->
        <label>Imagen actual:</label>
        <div>
            <img src="<?php echo $imagen; ?>" alt="Imagen actual" style="max-width: 150px;">
        </div>
        <label>Imagen 2 actual:</label>
        <div>
            <img src="<?php echo $imagen_2; ?>" alt="Imagen 2 actual" style="max-width: 150px;">
        </div>

        <input type="submit" name="guardar_cambios" value="Guardar cambios">
    </form>
</body>

</html>