<?php
class Personaje
{
    private $conexion;
    private $tablas = 'personajes';
    private $id;
    private $nombre;
    private $apellidos;
    private $biografia;
    private $categoria;
    private $wanted;
    private $foto;



    public function __construct()
    {
        $parametros = func_get_args();
        $numParams = func_num_args();
        $funcion_constructor = '__construct' . $numParams;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $parametros);
        }
    }
    public function __construct1($conexion)
    {
        $this->conexion = $conexion;
    }
    public function __construct4($conexion, $nombre, $apellidos, $biografia, $categoria, $wanted, $foto)
    {
        $this->conexion = $conexion;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->biografia = $biografia;
        $this->categoria = $categoria;
        $this->wanted = $wanted;
        $this->foto = $foto;


    }
    /**
     * Inserta un Personaje en la base de datos
     *
     * @return $stmt
     */
    public function create($conexion)
    {
        $insert = "insert into personajes(nombre, apellidos,biografia,categoria,wanted,foto) 
        values (:nombre,:apellidos,:biografia,:categoria,:wanted,:foto)";
        $stmt = $conexion->prepare($insert);

        return $stmt;

    }
    /**
     * Muestra los datos de la tabla Personajes
     *
     * @return void
     */
    public function read()
    {
        $query = 'select * from ' . $this->tablas . ' order by id asc';
        //preparamos la consulta
        $stmt = $this->conexion->prepare($query);
        //ejecutamos
        //si elegimos devolver los datos en array asociativo
        //$stmt->setFetchMode(PDO::FETCH_CLASS, 'alumnos');
        $stmt->execute();
        return $stmt;
    }
    public function update($conexion)
    {
        $update = "UPDATE personajes 
        SET  nombre = :nombre, apellidos=:apellidos,biografia=:biografia,categoria = :categoria, wanted=:wanted,foto = :foto
        WHERE id = :id";
        $stmt = $conexion->prepare($update);
        return $stmt;
    }
    public function delete($conexion)
    {
        $delete="DELETE FROM personajes WHERE id=:id";
        $stmt=$conexion->prepare($delete);
        return $stmt;
    }
    public function show($conexion)
    {
        $query = 'select * from ' . $this->tablas . ' where id=:id';
        //preparamos la consulta
        $stmt = $conexion->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //ejecutamos
        //si elegimos devolver los datos en array asociativo
        //$stmt->setFetchMode(PDO::FETCH_CLASS, 'alumnos');
        $stmt->execute();
        return $stmt;
    }

}