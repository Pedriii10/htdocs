<?php 

class database{
    private $servername = "127.0.0.1:3307";
    private $database = "tpv";
    private $username = "pedro";
    private $password = "Pedro10055";
    private $charset = "utf8";

    function conectar(){

        try{
            $conectar = "mysql.host=" . $this->servername . "; dbnombre=" . $this->database . "; charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conectar, $this->username, $this->password, $options);

            return $pdo;
            }
            catch (PDOException $e){
            echo 'Error en la conexión: ' . $e->getMessage();
            exit;
            }
       
    }
}

?>