<?php
//clase
class Index_model extends Conexion
{
//metodo constructor
    function __construct(){
       // $this->indexModel();
       parent::__construct();
    
    }
    function userLogin($email,$password){
        $where = " WHERE Email =:Email";
        $param = array('Email'=>$email);
        $response = $this->db->select1("*",'usuarios',$where,$param);
        if (is_array($response)){
            $response = $response[' results '];
            if (password_verify($password,$response["Password"])){
                $data = array(
                    "IdUsuario" => $response["IdUsuario"],
                    "Nombre" => $response["Nombre"],
                    "Apellido" => $response["Apellido"],
                    "Roles" => $response["Roles"],
                    "Imagen" => $response["Imagen"],
                );
                Session::setSession("User",$data);
                return $data;

            } else {
                $data = array(
                    "IdUsuario" => 0,
                );
                return $data;
            }


        } else {
            return $response;
        }


      

        //echo "Metodo index model";
    }
    
        
    
}

?>