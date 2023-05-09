const form = document.querySelector('form');
const email = document.getElementById('Email');
const password = document.getElementById('Password');
const submitBtn = document.querySelector('button[type="submit"]');

submitBtn.addEventListener('click', (e) => {
  e.preventDefault();
  validateInput();
});

function validateInput() {
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  
  let arr = [];
  
  if(emailValue === '') {
    setError(email, 'Email cannot be blank');
  } else if(!isValidEmail(emailValue)) {
    setError(email, 'Email is not valid');
  } else {
    setSuccess(email);
    arr.push(true);
  }
  
  if(passwordValue === '') {
    setError(password, 'Password cannot be blank');
  } else if(passwordValue.length < 8) {
    setError(password, 'Password must be at least 8 characters');
  } else {
    setSuccess(password);
    arr.push(true);
  }
  
  if(arr.length === 2) {
    form.submit(); // submit the form
  }
}

function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function setError(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  
  formControl.classList.remove('success');
  formControl.classList.add('error');
  small.innerText = message;
}

function setSuccess(input) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  
  formControl.classList.remove('error');
  formControl.classList.add('success');
  small.innerText = '';
}