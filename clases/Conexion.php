<?php 
class Conexion {

    private $host = 'localhost';
    private $user = 'golpederemo';
    private $database = 'PersonajesMadeInAlmeria';
    private $pass = 'arribaespaña';
    public $llave;

    public function getLllave() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
       //$this->llave = null;
        //new PDO("mysql:host='serv';dbname='bbdd',user,pass");
        try {
            $this->llave = new PDO($dsn, $this->user, $this->pass);
            $this->llave->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->llave->exec("set names utf8");            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->llave;
    }

}
