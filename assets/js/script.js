document.addEventListener("DOMContentLoaded", function() {
    // Muestra el loading page
    document.getElementById('loading').style.display = 'block';
    document.body.style.backgroundColor = 'rgba(44,0,118,1)';

    // Oculta el contenido principal
    document.getElementById('content').style.display = 'none';

    // Simula un tiempo de carga
    setTimeout(function() {
        // Oculta el loading page
        document.getElementById('loading').style.display = 'none';

        // Muestra el contenido principal
        document.getElementById('content').style.display = 'block';
    }, 2000); // Cambia 3000 por el tiempo en milisegundos que desees
});

document.addEventListener('DOMContentLoaded', (event) => {
    const editButtons = document.querySelectorAll('.edit');

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-id');
            const nombre = button.getAttribute('data-nombre');
            const descripcion = button.getAttribute('data-descripcion');
            const precio = button.getAttribute('data-precio');
            const cantidad = button.getAttribute('data-cantidad');
            const activo = button.getAttribute('data-activo');
            const imagen = button.getAttribute('data-imagen')

            document.getElementById('editProductId').value = productId;
            document.getElementById('edit_nombre').value = nombre;
            document.getElementById('edit_descripcion').value = descripcion;
            document.getElementById('edit_precio').value = precio;
            document.getElementById('edit_cantidad').value = cantidad;
            document.getElementById('edit_activo').value = activo;
            document.getElementById('edit_imagen').value = imagen;
        });
    });
});