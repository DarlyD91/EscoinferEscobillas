/*Alerta de cambio de estado del repuesto en listar*/
event.preventDefault();
function alerta(){
    
    Swal.fire({
        icon: 'success',
        title: 'Estado editado Correctamente',
        showConfirmButton: false,
      })

    }
    
    /*ALerta de actualizar*/
    function check(){
        Swal.fire({
            icon: 'success',
            title: 'Editado Correctamente',
            showConfirmButton: false,
          })
    }

    /*ALerta de registrar*/
    function registrar(){
        Swal.fire({
            icon: 'success',
            title: 'Registrado Correctamente',
            showConfirmButton: false,
            })
    }