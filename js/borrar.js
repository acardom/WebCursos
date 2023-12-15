function confirmarBorradoPerfil() {
    var respuesta = confirm("¿Estás seguro de que quieres borrar tu perfil?");

    if (respuesta) {
        window.location="borrar_perfil.php";
    }
    
}