<?php
// 1) Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "");
                mysqli_select_db($conexion, "c2640463_upestu");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 2) Almacenamos los datos del envío POST
$articulo = $_POST['articulo'] ?? '';
$marca = $_POST['marca'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$precio = $_POST['precio'] ?? '';

// carpeta para guardar imagenes
$target_dir = "uploads/";

// Subida de la primera imagen
$target_file1 = $target_dir . basename($_FILES["imagen"]["name"]);
$imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

// Subida de la segunda imagen
$target_file2 = $target_dir . basename($_FILES["imagen2"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

// Inicializar la variable de control de subida, si esta en 1 esta ok si llega en 0 daria el error
$uploadOk = 1;

// Verificar si son imagenes o no
if (getimagesize($_FILES["imagen"]["tmp_name"]) === false) {
    echo "El archivo no es una imagen.";
    $uploadOk = 0;
}
if (getimagesize($_FILES["imagen2"]["tmp_name"]) === false) {
    echo "El archivo no es una imagen.";
    $uploadOk = 0;
}

// Permitir solo algunos formatos de imagen
$allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType1, $allowedFileTypes)) {
    echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}
if (!in_array($imageFileType2, $allowedFileTypes)) {
    echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}

// Intentar subir las imágenes si no hay errores
if ($uploadOk && move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["imagen2"]["tmp_name"], $target_file2)) {
    // Verificar que todos los campos obligatorios tienen valor
    if ($articulo && $marca && $categoria && $precio ) {
        // Preparar la consulta SQL
        $consulta = "INSERT INTO productos (articulo, marca, categoria, precio, imagen, imagen_2)
                     VALUES (?, ?, ?, ?, ?, ?)";

        // Preparar la declaración
        $stmt = mysqli_prepare($conexion, $consulta);

        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "ssssss", $articulo, $marca, $categoria, $precio, $target_file1, $target_file2);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la página de éxito o a donde necesites
            header('location: agregar.html');
            exit();
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_stmt_error($stmt);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
} else {
    echo "Error al subir las imágenes.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>