import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('contextmenu', (e) => e.preventDefault()); // Desactiva clic derecho

document.addEventListener('keydown', (e) => {
    if (
        (e.ctrlKey && e.shiftKey && e.key === 'I') || // Ctrl+Shift+I
        (e.ctrlKey && e.shiftKey && e.key === 'J') || // Ctrl+Shift+J
        (e.ctrlKey && e.key === 'U') ||              // Ctrl+U (Ver código fuente)
        e.key === 'F12'                              // F12
    ) {
        e.preventDefault();
        alert('Acción no permitida');
    }
});
