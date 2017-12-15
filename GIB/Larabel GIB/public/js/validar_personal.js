  // alert("JS Vinculado..!!!");

var formulario = document.querySelector('form');
var v4 = document.querySelector('#n4');
var v6= document.querySelector('#n6');
var v8 = document.querySelector('#n8');
var v10 = document.querySelector('#n10');
var v12 = document.querySelector('#n12');
var v14 = document.querySelector('#n14');
var v16 = document.querySelector('#n16');
var v18 = document.querySelector('#n18');
var v20 = document.querySelector('#n20');
var v22 = document.querySelector('#n22');
var v24 = document.querySelector('#n24');
var PatronFecha = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
var PatronEmail = /\w+@\w+\.+[a-z]/;

// var PatronFecha = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;


  formulario.onsubmit = function (e) {


    if (formulario.nombre.value === '' || formulario.apellido.value === '' || formulario.edad.value === '' || formulario.fnacimiento.value === '' || formulario.dni.value === '' || formulario.telefonomovil.value === '' || formulario.email.value === '' || formulario.num_calle.value === ''
    || formulario.falta.value === '' || formulario.fbaja.value === '') {
  		e.preventDefault();
      window.alert('Hay Campos Incompletos...!!!');
    }else {
      if (isNaN(parseInt(formulario.edad.value))) {
          e.preventDefault();
          formulario.n3.style.display='inline-block';
          formulario.edad.style.border = "red 2px solid";
          alert('Error de formato en campo edad');
        }else{
          formulario.n3.style.display='none';
          formulario.edad.style.border = 'none';
        }
      if (isNaN(parseInt(formulario.dni.value))) {
         e.preventDefault();
         formulario.n7.style.display='inline-block';
         formulario.dni.style.border = "red 2px solid";
         alert('Error de formato en campo DNI');
        }else{
          formulario.n7.style.display='none';
          formulario.dni.style.border = 'none';
        }
      if (isNaN(parseInt(formulario.telefonomovil.value))) {
           e.preventDefault();
           formulario.n9.style.display='inline-block';
           formulario.telefonomovil.style.border = "red 2px solid";
           alert('Error de formato en campo Telefono Movil');
        }else{
          formulario.n9.style.display='none';
          formulario.telefonomovil.style.border = 'none';
        }
      if (isNaN(parseInt(formulario.num_calle.value))) {
           e.preventDefault();
           formulario.n15.style.display='inline-block';
           formulario.num_calle.style.border = "red 2px solid";
           alert('Error de formato en campo Numero de Calle');
          }else{
            formulario.n15.style.display='none';
            formulario.num_calle.style.border = 'none';
          }
          if (!(formulario.fnacimiento.value.match(PatronFecha))) {
              e.preventDefault();
              formulario.n5.style.display='inline-block';
              formulario.fnacimiento.style.border = "red 2px solid";
              alert('Error en formato de fecha');
          } else {
            formulario.n5.style.display='none';
            formulario.fnacimiento.style.border = "none";
          }

          if (!(formulario.falta.value.match(PatronFecha))) {
              e.preventDefault();
              formulario.n21.style.display='inline-block';
              formulario.falta.style.border = "red 2px solid";
              alert('Error en formato de fecha');
          } else {
            formulario.n21.style.display='none';
            formulario.falta.style.border = "none";
          }
          if (!PatronEmail.test(formulario.email.value)) {
            e.preventDefault();
            formulario.n11.style.display='inline-block';
            formulario.email.style.border = "red 2px solid";
            alert('Error en formato de Correo');
          }else {
            formulario.n11.style.display='none';
            formulario.email.style.border = 'none';
          }
          if(formulario.avatar.value===""){
              e.preventDefault();
              formulario.foto.style.display='inline-block';
              alert("Suba una Foto");
		      }else {
            formulario.foto.style.display='none';
          }

    }
  };



  formulario.nombre.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.nombre.style.border = "red 2px solid";
        // formulario.nombre.style.background ='rgb(224, 137, 142)';
        // formulario.n111.style.display = "inline-block";
        // n222.style.display = "inline-block";
    }else {
        formulario.nombre.style.border= "none";
        // formulario.nombre.style.background ='white';
        // formulario.n111.style.display = "none";
        // n222.style.display = "none";
    }
  })

  formulario.apellido.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.apellido.style.border= "red 2px solid";
        // formulario.apellido.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.apellido.style.border= "none";
        // formulario.apellido.style.background ='white';
    }
  })

  formulario.edad.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.edad.style.border= "red 2px solid";
        // formulario.edad.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.edad.style.border= "none";
        // formulario.edad.style.background ='white';
    }
  })

  formulario.fnacimiento.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.fnacimiento.style.border= "red 2px solid";
        // formulario.fnacimiento.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.fnacimiento.style.border= "none";
        // formulario.fnacimiento.style.background ='white';
    }
  })
  formulario.dni.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.dni.style.border= "red 2px solid";
        // formulario.dni.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.dni.style.border= "none";
        // formulario.dni.style.background ='white'
    }
  })

  formulario.telefonomovil.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.telefonomovil.style.border= "red 2px solid";
        // formulario.telefonomovil.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.telefonomovil.style.border= "none";
        // formulario.telefonomovil.style.background ='white'
    }
  })

  formulario.email.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.email.style.border= "red 2px solid";
        // formulario.email.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.email.style.border= "none";
        // formulario.email.style.background ='white'
    }
  })

  formulario.num_calle.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.num_calle.style.border= "red 2px solid";
        // formulario.num_calle.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.num_calle.style.border= "none";
        // formulario.num_calle.style.background ='white'
    }
  })

  formulario.falta.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.falta.style.border= "red 2px solid";
        // formulario.falta.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.falta.style.border= "none";
        // formulario.falta.style.background ='white'
    }
  })

  formulario.fbaja.addEventListener('blur', function(){
    if (this.value == ''){
        formulario.fbaja.style.border= "red 2px solid";
        // formulario.fbaja.style.background ='rgb(224, 137, 142)';
    }else {
        formulario.fbaja.style.border= "none";
        // formulario.fbaja.style.background ='white';
    }
  })

  /// Pre visualizar foto_perfil


document.getElementById("botonFileReal").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let mostrar = document.getElementById('mostrar'),
    		image = document.createElement('img');
    image.style.width="100%";

    image.src = reader.result;

    mostrar.innerHTML = '';
    mostrar.append(image);
  };
}
