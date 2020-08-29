/*CODIGO DE USARIOS */
var usuarios = new Usuarios();
var LoginUser =() =>{
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    usuarios.loginUser(email, password);
}
var sessionClose = ()=>{
    usuarios.sessionClose();
}

/*metodo que se ejecuta automaticamente cada vez que se actualiza  la vista en la aplicacion*/
$().ready(()=>{
    let URLactual = window.location.pathname;
    usuarios.userData(URLactual);

    /*invocar el id del formulario para la validacion */
    $("#login").validate();
    /** para inicializar en la pagina pirnicpal  el sidenav */
    $('.sidenav').sidenav();


});