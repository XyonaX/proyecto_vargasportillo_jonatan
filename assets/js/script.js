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
