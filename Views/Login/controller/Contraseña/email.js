function email() {
    Swal.fire({
        icon: 'ssucess',
        title: 'Genial..!',
        text: 'Tu contraseña se ha guardado exitosamente.!',
      })
      setTimeout(() => {
        window.location.reload();
    }, 6000);
    }