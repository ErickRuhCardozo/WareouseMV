function togglePasswordVisibility() {
  let input = document.getElementById('passwordField');
  let toggler = document.getElementById('passwordToggler');

  if (input.type === 'password') {
    input.type = 'text';
    toggler.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
  } else {
    input.type = 'password';
    toggler.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
  }
}
