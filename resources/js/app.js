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

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const popup = document.getElementById('passwordPopup');
    const rules = {
        lengthRule: (password) => password.length >= 8,
        uppercaseRule: (password) => /[A-Z]/.test(password),
        numberRule: (password) => /[0-9]/.test(password),
        specialCharRule: (password) => /[!@#$%^&*(),.?":{}|<>]/.test(password),
    };

    // Mostrar el popup al hacer foco en el campo
    passwordInput.addEventListener('focus', function () {
        popup.classList.remove('hidden');
    });

    // Ocultar el popup al salir del campo
    passwordInput.addEventListener('blur', function () {
        popup.classList.add('hidden');
    });

    // Validar reglas en tiempo real
    passwordInput.addEventListener('input', function () {
        const password = passwordInput.value;

        for (const [ruleId, validationFn] of Object.entries(rules)) {
            const ruleElement = document.getElementById(ruleId);
            if (validationFn(password)) {
                ruleElement.classList.remove('text-red-600');
                ruleElement.classList.add('text-green-600');
            } else {
                ruleElement.classList.remove('text-green-600');
                ruleElement.classList.add('text-red-600');
            }
        }
    });
});
