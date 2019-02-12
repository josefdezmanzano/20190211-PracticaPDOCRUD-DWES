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
</style>    

<link href="https://fonts.googleapis.com/css?family=Hanalei+Fill|Indie+Flower|Staatliches" rel="stylesheet">

 <title>Index</title>
  </head>
  <?php
    spl_autoload_register(function ($clase) {
        require './clases/' . $clase . '.php';
    });
    ?>
  <body>
 <?php 
if (isset($_POST['btn_env'])) {

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $biografia = $_POST['biografia'];
    $categoria = $_POST['categoria'];
    $wanted = $_POST['wanted'];
    $insert = "insert into personajes(nombre, apellidos,biografia,categoria,wanted) 
    values (:nombre,:apellidos,:biografia,:categoria,:wanted)";
    //$foto=$_POST['foto'];

    try {
        $dbc = new Conexion();
        $millave = $dbc->getLllave();
        $stmt = $millave->prepare($insert);
        $stmt->execute(array(':nombre' => $nombre, ':apellidos' => $apellidos, ':biografia' => $biografia, ':categoria' => $categoria, ':wanted' => $wanted));
        echo "Nuevo personaje insertado correctamente, ya puedes disfrutar de sus andanzas";
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }
     //Si llegamos aqui se ha guardado el alumno
                //Y cerramos la conexion
                unset($_POST['btn_env']);
                $stmt = null;
                $millave = null;
                header("Location:index.php");

}

?>

<div class="mivdivcentral">
<h1 class="mititulo">Nuevo Personaje</h1>
    <div class="container">
   
   
    <form name="f1" action="insertar.php" method="POST">

    <div class="form-group">
    <label for="exampleInputPassword1">Nombre:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="nombre" placeholder="Introducel el Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellidos:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="apellidos" placeholder="Introducel el Apellido">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Biografía:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="biografia" placeholder="Introducel la Biografía">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Categoria:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="categoria" placeholder="Categoria">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Wanted:</label>
    <select class="form-control form-control-sm" name="wanted">
  <option value="SI" >SI</option>
  <option value="NO" >NO</option>
</select>
  </div>
  <button type="submit" name="btn_env" class="btn btn-primary">Registrar persona potencialmente peligrosa</button>
</form>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>