<?php
class Usuarios extends Controllers
{
    function __construct()
    {
        parent::__construct();

    }
    public function destroySession(){
        session::destroy();
        header("Location:".URL);
    }

}

?>