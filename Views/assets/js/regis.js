function ErrorRegistroCorreo() {
  Swal.fire({
      icon: 'error',
      title: 'Ups!!',
      text: 'Este correo ya existe, intentalo de nuevo',
    })
  }


 function UsuarioRegistrado() {
    swal({
        title: "Perfecto!!",
        text: "Usuario registrado exitosamente",
        icon: "success",
        button: "Aww yiss!",
      });
}