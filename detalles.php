<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   <!-- Mis estilos -->
   <link rel="stylesheet" href="css/estilos.css">

   <style>
  *{
    font-family: 'Lobster', cursive;
    font-family: 'Roboto', sans-serif;   
  }
body {
background-color: #536dfe;
}
.mititulo{
    text-shadow: 3px 3px 5px whitesmoke,
        6px 6px 5px blueviolet,
        9px 9px 5px blue;
        font-family: 'Permanent Marker', cursive;
        text-align: center !important;
}
.table{
margin-top:auto;  
margin-bottom: 10%;

}
.mivdivcentral{
  background-color: #b0bec5;
  width:auto;
  height: auto;
  border-radius: 15px 50px;
  display: table;
  margin: 0 auto;
  margin-top: 5%;
  margin-bottom: 5%;
  border: 1px solid;
  padding: 10px;
  box-shadow: 5px 5px 8px gray, 10px 10px 8px black, 15px 15px 8px blue;
}
th{
  text-align: center;
  font-family: 'Indie Flower', cursive;
}
</style>
 <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Roboto" rel="stylesheet"> 
 <title>Index</title>
  </head>
  <?php
    spl_autoload_register(function ($clase) {
        require './clases/' . $clase . '.php';
    });
    ?>
  <body>
 

<div class="mivdivcentral">
<h1 class="mititulo">La Base de datos de los personajes de Almeria</h1>
    <div class="container">
  <ul class="list-group">
  <li class="list-group-item">Detalles</li>
 <?php 

if (isset($_GET["id"])) {
    //conexion-----------------



    $dbc = new Conexion();
    $millave = $dbc->getLllave();
    $id = $_GET['id'];
    $consulta = "select * from personajes where id=:id";
  //$insert = "insert into personajes(nombre, apellidos,biografia,categoria,wanted) 
  //values (:nombre,:apellidos,:biografia,:categoria,:wanted)";
  //$foto=$_POST['foto'];


     //Preparamos
    $stmt = $millave->prepare($consulta);
    //asignamos el fetch indicando que hay varios tipos
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
      //ejecutmos la consulta
    $stmt->execute(array(':id' => $id));
      //echo "Nuevo personaje insertado correctamente, ya puedes disfrutar de sus andanzas";
      //pintamos lo datos
    while ($fila = $stmt->fetch()) {
        echo "<li class='list-group-item list-group-item-dark'>Nombre: " . $fila['nombre'] . "</li>";
        echo "<li class='list-group-item list-group-item-dark'>Apellidos: " . $fila['apellidos'] . "</li>";
        echo "<li class='list-group-item list-group-item-dark'>Biografía: " . $fila['biografia'] . "</li>";
        echo "<li class='list-group-item list-group-item-dark'>Categoria: " . $fila['categoria'] . "</li>";
        echo "<li class='list-group-item list-group-item-dark'>¿En busca y captura?: " . $fila['wanted'] . "</li>";
        echo "<div class='container text-center mt-4' >";
        echo "<h2 class='text-center mt-2 mititulo'> Foto de perfil</h2>";
        echo "<img  style='border:3pt solid black;' src='" . $fila['foto'] . "' alt='No apto para ojos sensibles' height='400' width='600'> ";
    }
  //Cerramos la conexion
    $stmt = null;
    $millave = null;
    ?>
  </ul>
  <center><a class="btn btn-dark mt-3" href="index.php">Volver</a></center>
</div>

</div>
<?php 

}

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>