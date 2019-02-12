<?php
spl_autoload_register(function ($clase) {
    require './clases/' . $clase . '.php';
});
if(isset($_GET['id'])){
    $dbc = new Conexion();
    $conexion = $dbc->getLllave();

    $personaje = new Personaje($conexion, $nombre, $apellidos, $biografia, $categoria, $wanted, $foto);

    $stmt = $personaje->delete($conexion);
    $stmt->execute(array(
        ':id' => $_GET['id']
      ));
      if (!$stmt) {
        echo "Error al insertar !!!!!!!!!";
        die();
      }
      //echo "Personaje potenciamente peligroso insertado correctamente";
      //echo "<a calss='btn btn-warning' href='index.php'>Volver</a>";
      //Si llegamos aqui se ha guardado el alumno
    //Y cerramos la conexion
      $stmt = null;
      $millave = null;
      header("Location:index.php");
}