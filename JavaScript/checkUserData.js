//método para previsualir¡zar la imagen del usuario, al introducir nuevo usuario
function previsualizarUsuario(){
    //recogemos el valor del input url
    let previsualizar = document.getElementById("aurl").value;
    //y lo colocamos en el src
    document.getElementById("imgPre").src = previsualizar;

}
function previsualizarPelicula(){
    let validar = document.getElementById("urlm").value;
    document.getElementById("imgVal").src = validar;
}

//generar nick aleatorio
function generar(){
    //obtenemos el email
    let email = document.getElementById("ema").value;
    //separamos los numeros y las letras
    var numeros = '';
    var letras = '';
    for (var i = 0; i< email.length; i++) {
        var caracter = email.charAt(i);
        if(isNaN(caracter)){
            letras += caracter; 
        }else{
            numeros += caracter;
        }
    }

    //cogemos las 5 primeras letras del nuevo string
    let nick = letras.substring(0, 5);
   
    //le añadimos 4 números aleatorios al a las 5 primeras letras dle email
    for(let i = 0; i<= 3; i++){
        num = generarNumAleatorio(0, 10);
        nick +=num; 
    }
    //nick.toLowerCase();
    //userNick = trim(nick);
    
    document.getElementById("nic").value = nick;
}

//método para generar un número alaetorio
function generarNumAleatorio(min, max){
    return Math.floor(Math.random()*(max-min))+min;
}

//validación del email
function validarEmail(correo){
    //let correo = document.getElementById("ema").value;
    var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    let esValido = expReg.test(correo);

   return esValido;
}

//comrpobaos los datos del usario antes de insertarlo
function enviarFormularioUsuario(){
    //comprivación de datos
    let nick, email, url;
    nick = document.getElementById('nic').value;
    email = document.getElementById('ema').value;
    url = document.getElementById('aurl').value;

    //var errorMessajes = [];

    if(nick==null || nick==""){
        //swal('Oops...', 'check the nick!')
        alert('check the nick');
        return false;
    }
    if (validarEmail(email)==false){
        alert('the email format is wrong');
        return false;
    }
    if(url == ""){
        alert('check user picture');
        return false;
    }

    document.formUser.submit();
}

//comprobamos los datos de lapelícula, antes de insertarlo
function enviarFormularioPelicula(){
    let id, nombre, estreno, director, foto, sinopsis;
    id = document.getElementById('pid').value;
    nombre = document.getElementById('nom').value;
    estreno = document.getElementById('an').value;
    director = document.getElementById('dir').value;
    foto = document.getElementById('urlm').value;
    sinopsis = document.getElementById('sip').value;
    //id = trim(id);
    //id.toLowerCase();
    if(id=="" || id==null){
        alert('check the id');
        return false;
    }
    if(nombre==""){
        alert('check the name');
        return false;
    }
    if(director==""){
        alert('check the director name');
        return false;
    }
    if(foto==null){
        alert('check the director name');
        return false;
    }
    if(sinopsis==""){
        alert('check the synopsis');
        return false;
    }
    //seguir comporbando el resto de datos

    document.formMovie.submit();

}

//método para la confimación de la eliminaciónde la peli (POUP)
function confirmDelete(){
    let valido = confirm('¿do you want to remove this movie?');
    if(valido){
        document.deleteForm.submit();
        return true;
    }else{
        return false;
    }
}

/*
let linkDelete = document.querySelectorAll("btnEliminar");
for(var i = 0; i<linkDelete.length; i++){
    linkDelete[i].addEventListener(click, confirmDelete);
}

function confirmarenvio(){
    Swal('Oops...', 'check the nick!')
}
*/