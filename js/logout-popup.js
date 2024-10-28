
    window.addEventListener('DOMContentLoaded', (event) => {
        // Verifica se o parâmetro de URL "logout=success" está presente
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('logout') === 'success') {
            const popup = document.getElementById('logout-popup');
            popup.classList.remove('hidden'); // Remove a classe que oculta a pop-up
            popup.classList.add('show'); // Adiciona a classe que exibe a pop-up com slide

            // Oculta a pop-up após 3 segundos
            setTimeout(() => {
                popup.classList.remove('show');
                setTimeout(() => popup.classList.add('hidden'), 500); // Oculta completamente após a animação
            }, 3000);
        }
    });
