class Usuarios{
    constructor(){
    }

    loginUser(email, password){
      
        
        if(email== ""){
            document.getElementById("email").focus();
            M.toast({html: 'Ingrese el email', classes: 'rounded'});
        } else {
            if (password == ""){
                document.getElementById("password").focus();
                M.toast({ html: 'Ingrese el password', classes: 'rounded'});
            }else {
                if(validarEmail(email)){
                    if (6 <= password.length){
                        $.post(
                            "Index/userLogin",
                            {email, password},
                            (response)=>{
                                console.log(response);
                                try {
                                        var item = JSON.parse(response);
                                        console.log(item);
                                        if(0 < item.IdUsuario){
                                            localStorage.setItem("user", response);
                                            window.location.href = URL + "Principal/principal";   

                                        }else{
                                        document.getElementById("indexMessage").innerHTML = "Correo o contraseña incorrecto";
                                        }
                                }catch (error) {
                                    document.getElementById("indexMessage").innerHTML = response;
                                }
                            }
                            
                        ); 

                    }else{
                        document.getElementById("password").focus();
                        M.toast({ html: 'Introduzca al menos 6 caracteres',classes: 'rounded'});
                    }
                }else {
                    document.getElementById("email").focus();
                    M.toast({html:'Ingrese una Direccion de correo electronico valida', classes:
                    'rounded'});
                }
            }
        } 

    }

    userData(URLactual){
        if (PATHNAME == URLactual) {
            localStorage.removeItem("user");
            document.getElementById('menuNavbar1'). style.display = 'none';
            document.getElementById('menuNavbar2'). style.display = 'none';
        }else{
            if (null != localStorage.getItem("user")){
                let user = JSON.parse(localStorage.getItem("user"));
                if(0 < user.IdUsuario){
                    document.getElementById('menuNavbar1'). style.display = 'block'
                    document.getElementById('menuNavbar2'). style.display = 'block'
                    document.getElementById("name1").innerHTML = user.Nombre + " " + user.Apellido;
                    document.getElementById("role1").innerHTML = user.Roles;
                    document.getElementById("name2").innerHTML = user.Nombre + " " + user.Apellido;
                    document.getElementById("role2").innerHTML = user.Roles;
                }
                
            }
        }
    }
    sessionClose() {
        localStorage.removeItem("user");
            document.getElementById('menuNavbar1').style.display = 'none';
            document.getElementById('menuNavbar2').style.display = 'none';
    }

}