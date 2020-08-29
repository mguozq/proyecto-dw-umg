<?php
//crear una clase
class Controllers
{
//crear metodo constructor
    public function __construct() {
        Session::start();
     //instancear la clase View
     $this->view = new Views();
        
   /* echo "Sistema de php" ;*/
//inovocar metodo loadclassmodels para apoder obtener los nombres de los controladores
       $this->LoadClassmodels(); 

    }
    //funcion 
    function LoadClassmodels(){

        $model = get_class($this). '_model';
        //variable
        $path = 'Models/'.$model. '.php';
            if(file_exists($path)){
                require $path;
                $this->model = new $model();

            }

    }
}

?>