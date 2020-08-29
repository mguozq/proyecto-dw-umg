<?php
class QueryManager
{
    #conexion con la base de datos
    private $pdo;
    function __construct($USER,$PASS,$DB){

        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname='.$DB.';charset=utf8'
            , $USER, $PASS,
            [
              # ESTA EVITA LA INYECCION DE SQL 
                //PDO:: ATTR_EMULATE_PREPARES, false,
                PDO:: ATTR_EMULATE_PREPARES => false,
               PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
            ]
            );
        }catch (PDOException $e){
            print "¡Error!:" . $e->getMessage();
            die();
        }
    }
    # funcion para crear consulata a la tabla
    #$attr va obtener las columnas que consultamos
    #contiene el nombre de nuestro tabla
    # where clausula para consultar las tablas
    # param para poder consultar las tablas

    function select1($attr,$table,$where,$param){
        try{
            $where = $where ?? "";
            $query = "SELECT".$attr." FROM ".$table.$where;
            $sth = $this->pdo->prepare($query);
            $sth->execute($param);
            $response = $sth->fetch(PDO::FETCH_ASSOC);
            return array(" results "=> $response);
        }catch (PDOException $e) {
            return $e->getMessage();
        }
        $pdo = null;
    }
}
?>