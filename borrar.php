<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar

  // 2) Almacenamos los datos del envío GET
  // a) generar variables para el id a utilizar

  // 3) Preparar la orden SQL
  // DELETE FROM nombre_tabla WHERE campo_tabla=dato
  // => Elimina de la siguiente tabla el registro donde este campo sea igual a este dato
  // DELETE FROM nombre_tabla
  // => Elimina todos los registros de la siguiente tabla
  // a) generar la consulta a realizar

  // 4) Ejecutar la orden y eliminamos el regitro seleccionado
  // a) ejecutar la consulta
  // a) rederigir a index
?>
<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "c2640463_upestu");

// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET["id"];

// 3) Preparar la orden SQL
// DELETE FROM nombre_tabla WHERE campo_tabla=dato
// => Elimina de la siguiente tabla el registro donde este campo sea igual a este dato
// a) generar la consulta a realizar
$consulta = "DELETE FROM productos WHERE id=$id";

// 4) Ejecutar la orden y eliminamos el regitro seleccionado
// a) ejecutar la consulta
// a) rederigir a index
mysqli_query($conexion, $consulta);

header("location:listar.php");