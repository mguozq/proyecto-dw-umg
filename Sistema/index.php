<?php
require "Config.php";
$url = $_GET["url"] ?? "Index/index";
//Invocar un metodo
$url = explode("/", $url);
//crear un objeto llamado controller
$controller = "";

//crear  un objeto llamado method
$method = "";
//evaluar la posicion 0
if(isset($url[0])){
// asignar arreglo url a metodo controller
$controller = $url[0];
}

//evaluar la posicion 1
if(isset($url[1])){
    // si contiene datos se crea otra condicion
    //si posicion uno es distinto a vacio
    if($url[1] != ''){
        $method = $url[1];
    }
    
}
//crear una funcion para cargar las clases que estan siendo invocadas desde archivo index
// en esta funcion se invoca lo que contenga la carpeta model y cotroller
spl_autoload_register(function($class){
    //invocar un metodo verifica si existe el archivo que estamos invocando en la carpeta librerias //LBS
    if (file_exists(LBS.$class. ".php")){
//Si el archivo existe en el directorio Library
// aqui invocamos todas las clases que contenga la carpeta libreria
        require LBS.$class.".php";
    }

});
//invocar  metodo Error
require 'Controllers/Error.php';

// crear metodo de error para isntanciar metodo  Error

$error = new Errors();

//crear un objeto y asignar la istancia controllers
//$obj = new Controllers();

//echo $controller. " ".$method;

//invocar todos los arvhivos que contenga la carpeta Controllers
// crear directorio
//crear variable  llamada controller
$controllersPath = "Controllers/".$controller. '.php';
//crear una condicion
if (file_exists($controllersPath)){
    //Si el archivo existe en el directorio Library
    // aqui invocamos todas las clases que contenga la carpeta libreria
            require $controllersPath;

            
            //crear un objeto y asignar la istancia controller
            $controller = new $controller();
            //evaluar dato alamacenado en la variable metoodo
            if(isset($method)){
                // verificar si el metodo esta en directorio controller
                if(method_exists($controller, $method))
                {
                // si existe el controlador entonces  invocar siguiente metodo 
                $controller->{$method}();
        
                } else{
                    //ejecuta metodo error
                    $error ->error();
                    
                }


            }

}else{
//ejecuta metodo error
    $error ->error();
}
?>