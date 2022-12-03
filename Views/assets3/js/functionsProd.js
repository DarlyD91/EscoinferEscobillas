//Regex de validación de formularios repuestos
const reglas={
  textos:/^[a-zA-ZÁ-ÿ0-9\s]{5,50}$/, //Texto
  numeros:/^[0-9.]{3,15}$/, //Valores 
}


const valores={
  nombreRepuesto:false,
  descripcionRepuesto:false,
  precioUnidad:false
}

//Acceder al formulario 
let form=document.getElementById("frm-usuario");
let campos=document.querySelectorAll("#frm-usuario input");
//Agregar Listener de evento submit al formulario que se envia
form.addEventListener('submit',e=>{
    e.preventDefault(); //Evitar que se envie el formulario para realizar las validaciones

    //Enviar Formulario cuando las validacioes sean correctas
    if(valores.nombreRepuesto && valores.descripcionRepuesto && valores.precioUnidad){
      form.submit();
    }
    else{
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Los campos no estan diigenciados correctamente',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
      });
    }
})

const validarInput=(regla,input,grupo)=>{
  if(regla.test(input.value)){
          document.getElementById(`g-${grupo}`).classList.remove('error');
          document.getElementById(`g-${grupo}`).classList.add('success');
          document.querySelector(`#g-${grupo} i`).classList.add('bi-check-circle-fill');
          document.querySelector(`#g-${grupo} i`).classList.remove('bi-exclamation-circle-fill'); 
          document.querySelector(`#g-${grupo} .msn-error`).classList.remove('msn-error-visible');
          valores[grupo] = true;     
        }

  else{
          document.getElementById(`g-${grupo}`).classList.add('error');
          document.getElementById(`g-${grupo}`).classList.remove('success');
          document.querySelector(`#g-${grupo} i`).classList.remove('bi-check-circle-fill');
          document.querySelector(`#g-${grupo} i`).classList.add('bi-exclamation-circle-fill');
          document.querySelector(`#g-${grupo} .msn-error`).classList.add('msn-error-visible'); 
          valores[grupo] = false;     
      
        }

}

const validarCampos=(e)=>{
  console.log("Se generó un evento sobre el input"+e.target.name);
  switch(e.target.name){
      case "nombreRepuesto":
          validarInput(reglas.textos,e.target,e.target.name);
      break;
      case "descripcionRepuesto":
          validarInput(reglas.textos,e.target,e.target.name);
      break;
      case "precioUnidad":
          validarInput(reglas.numeros,e.target,e.target.name);
      break;
  }
  
}

campos.forEach((campo)=>{
  campo.addEventListener("keyup",validarCampos);
  campo.addEventListener("blur",validarCampos);
})

