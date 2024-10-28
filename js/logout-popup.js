 // Script para ocultar a popup após um tempo
 setTimeout(function() {
    const popup = document.getElementById('logout-popup');
    if (popup) {
        popup.classList.remove('show'); // Remove a classe para ocultar a popup
    }
}, 4000); // Esconde a popup após 4 segundos (1 segundo de fade-in + 3 segundos visível)