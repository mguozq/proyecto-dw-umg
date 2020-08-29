<?php
class Conexion
{
    function __construct(){
        $this->db= new QueryManager("root","","sistema_facturacion");

        
    }

}

?>