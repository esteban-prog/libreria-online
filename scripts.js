document.addEventListener("DOMContentLoaded", function() {
  // Validación del formulario de inicio de sesión
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', function(event) {
      const password = document.getElementById('password').value;
      const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;  // Contraseña con mayúsculas y números
      if (!passwordRegex.test(password)) {
        event.preventDefault();  // Evita que el formulario se envíe
        alert('La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula y un número.');
      }
    });
  }

  // Validación del formulario de registro
  const registerForm = document.getElementById('registerForm');
  if (registerForm) {
    registerForm.addEventListener('submit', function(event) {
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;  // Contraseña con mayúsculas y números
      const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;  // Validación de correo

      // Verificar si el correo es válido
      if (!emailRegex.test(email)) {
        event.preventDefault();  // Evita que el formulario se envíe
        alert('Por favor ingresa un correo electrónico válido.');
        return;
      }

      // Verificar si la contraseña cumple con la estructura
      if (!passwordRegex.test(password)) {
        event.preventDefault();  // Evita que el formulario se envíe
        alert('La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula y un número.');
        return;
      }
    });
  }
});
