<?php
//crear una clase
class Index extends Controllers
{
//crear metodo constructor
public function __construct() {
    //echo "Controlador Index";
    //invocar metodo contructor de la clase padre
    parent::__construct	();
    }
    //crar un metodo pubblico llamado index
    public function index(){
        
        $user = $_SESSION["User"]?? null;
        if(null != $user){
            Header("Location:".URL."Principal/principal");
        }else{
          $this->view->render($this,"index");
        }
       // echo "Metodo index";
       
    }
    public function userLogin(){
        if(isset($_POST["email"]) && isset($_POST["password"])){
            //linea para encriptar password
            //echo password_hash($_POST["password"], PASSWORD_DEFAULT);
           $data = $this->model->userLogin($_POST["email"], $_POST["password"]);
            if (is_array($data)){
                echo json_encode($data);

            }else {
                echo $data;
            }
        }
    }
    

}

?>