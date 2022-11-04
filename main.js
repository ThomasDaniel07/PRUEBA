const mensaje = document.getElementById('mensaje'); // LLAMO AL ELEMENTO QUE CONTIENE EL VALOR DEL MENSAJE


// SI DEVULVE TRUE ES QUE SE HIZO TODO EL REGISTRO CON EXITO

if (mensaje.value === 'true') {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Vehiculo registrado con exito',
        showConfirmButton: false,
        timer: 1500
    })
}