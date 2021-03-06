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
    <a class="btn btn-primary mt-2" style="margin-bottom: 1%;" href="insertar.php">Nuevo Personaje</a>  
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Biografía</th>
      <th scope="col">Categoria</th>      
      <th scope="col">¿En Busca y captura?</th>
      <th scope="col">Foto</th>
      <th scope="col">Acciones</th>

    
    </tr>
  </thead>
  <tbody>
  <?php 

  $dbc = new Conexion();
  $millave = $dbc->getLllave();
  $personaje = new Personaje($millave);

  $stmt = $personaje->read();
  while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo " <tr>";
    echo "      <th scope='row'>" . $fila->id. "</th>";
    echo "      <td>" . $fila->nombre . "</td>";
    echo "      <td>" . $fila->apellidos . "</td>";
    echo "      <td>" . $fila->biografia . "</td>";
    echo "      <td>" . $fila->categoria . "</td>";
    echo "      <td>" . $fila->wanted . "</td>";
    echo "      <td>" . "<img src='".$fila->foto ."' alt='No apto para ojos sensibles' height='150' width='150'> " . "</td>";
    echo "      <td>"
      . "<a style='display:inline; margin:1%;' href='actualizar.php?id=" . $fila->id . "'class='btn btn-warning'>" . "Actualizar" . "</a>"
      . "<a style='display:inline; margin:1%;' href='borrar.php?id=" . $fila->id . "'class='btn btn-danger'>" . "Borrar" . "</a>"
      . "<a style='display:inline; margin:1%;' href='detalles.php?id=" . $fila->id . "'class='btn btn-dark'>" . "Detalles" . "</a>" . "</td>";
    
      echo "  </tr>";
  }
                    //Cerramos la conexion
  $stmt = null;
  $millave = null;
  ?>
  </tbody>
</table>

</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>