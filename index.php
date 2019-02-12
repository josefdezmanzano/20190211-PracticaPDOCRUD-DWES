<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   <!-- Mis estilos -->
   <link rel="stylesheet" href="">

<style>
  *{
    font-family: 'Atomic Age', cursive;
  }
body {
background-color: #536dfe;
}
.mititulo{
    text-shadow: 3px 3px 5px whitesmoke,
        6px 6px 5px #0f0,
        9px 9px 5px #00f;
        font-family: 'Staatliches', cursive; text-align: center !important;
}
</style>    
<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Major+Mono+Display|Staatliches" rel="stylesheet">
 <title>Index</title>
  </head>
  <?php
  spl_autoload_register(function ($clase) {
    require './clases/' . $clase . '.php';
  });
  ?>
  <body>
  <h1 class="mititulo">La Base de datos de los personajes de Almeria</h1>

    <div class="container">
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
    
    </tr>
  </thead>
  <tbody>
  <?php 

  $dbc = new Conexion();
  $millave = $dbc->getLllave();
                    //Ya tenemos la conexion y la llave guardada
                    //1.- Consulta
  $consulta = "select * from personajes";
                    //2.- Preparamos la consulta
  $stmt = $millave->prepare($consulta);
                    //3.- Ponemos el fetch mode(Hay varios tipos)
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    //4.- Ejecutamos y tal a ver que pasa
  $stmt->execute();
                    //5.- A mostrar datos
  while ($fila = $stmt->fetch()) {
    echo " <tr>";
    echo "      <th scope='row'>" . $fila['id'] . "</th>";
    echo "      <td>" . $fila['nombre'] . "</td>";
    echo "      <td>" . $fila['apellidos'] . "</td>";
    echo "      <td>" . $fila['biografia'] . "</td>";
    echo "      <td>" . $fila['categoria'] . "</td>";
    echo "      <td>" . $fila['wanted'] . "</td>";
    echo "      <td>" . $fila['foto'] . "</td>";
        //echo "      <td>" . "<a href='update.php?id=" . $fila['id_al'] . "'class='btn btn-success'>" . "Update" . "</a></td>";
    echo "  </tr>";
  }
                    //Cerramos la conexion
  $stmt = null;
  $millave = null;
  ?>
  </tbody>



</table>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>