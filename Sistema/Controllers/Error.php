<?php
//crear una clase de error
class Errors extends Controllers
{
//crear metodo error
public function error()
{
$this->view->render($this,"error");

}

}

?>