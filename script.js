function abrirModalAgregar() {
    document.getElementById("modalAgregar").style.display = "block";
}

// Función para cerrar la ventana modal de agregar

function cerrarModalAgregar() {
    document.getElementById("modalAgregar").style.display = "none";
}



$(document).ready(function(){
    $('.mostrar').click(function(){
        const id = $(this).attr('IdUsuario');
        $('#idUsuarioEliminar').val(id); // Asignar el ID de usuario al campo oculto
        $('#modalEliminar').show(); // Mostrar el modal de eliminación
    });
});

// Función para cerrar la ventana modal de agregar
function cerrarModalEliminar() {
    document.getElementById("modalEliminar").style.display = "none";
}


function abrirModalEditar() {
    console.log("Modal de edición abierto"); // Agrega este console.log() para verificar si la función se ejecuta correctamente
    document.getElementById("modalEditar").style.display = "block";
}

// Función para cerrar la ventana modal de agregar
function cerrarModalEditar() {
    document.getElementById("modalEditar").style.display = "none";
}
$(document).ready(function(){
    $('.editar').click(function(){
        const id = $(this).data('id');
        $('#idUsuarioEditar').val(id);

        // Obtener los datos del usuario correspondiente mediante una solicitud AJAX
        $.ajax({
            url: 'obtener_usuario.php',
            method: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                // Rellenar los campos del formulario con los datos del usuario
                $('#nuevoUsuario').val(data.usuario);
                $('#nuevaContrasena').val(''); // Limpiar el campo de contraseña
                $('#nuevoRol').val(data.rol);
                // Mostrar el modal de edición
                abrirModalEditar();
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los datos del usuario:', error);
            }
        });
    });
});
