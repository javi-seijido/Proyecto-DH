// var boton = document.querySelector(".change_pass");
// var contenedor = document.querySelector("#recuperar_pass");
// var botonCerrar = document.querySelector("#cerrar_rec");
//
// boton.onclick = function (){
//   contenedor.style.display = "block";
// }
//
// botonCerrar.onclick = function (){
//   contenedor.style.display = "none";
// }


function mouseoverPass(obj) {
  var obj = document.getElementById('myPassword');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('myPassword');
  obj.type = "password";
}

//---------------VALIDACION DE CAMPOS DEL FORMULARIO----------------------------------------
var form_login = document.querySelector('#form_login');
var error_user = document.querySelector('#err_user');
var error_pass = document.querySelector('#err_pass');

form_login.onsubmit = function(e){
  if (form_login.usr.value == '') {
         e.preventDefault();
         error_user.style.display = 'block';
   }
   else if (form_login.pass.value == '') {
               e.preventDefault();
               error_pass.style.display = 'block';
   }
}

form_login.usr.addEventListener('focus', function(){
  error_user.style.display = 'none';
  this.className = 'us_log';
})

form_login.pass.addEventListener('focus', function(){
  error_pass.style.display = 'none';
  this.className = 'pa_log';

})

form_login.usr.addEventListener('blur', function(){
  if (this.value == ''){
      this.className = this.className + ' marcar_input';
  }
})

form_login.pass.addEventListener('blur', function(){
  if (this.value == ''){
      this.className = this.className + ' marcar_input';
  }
})
