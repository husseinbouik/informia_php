const form = document.querySelector('form');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email = document.getElementById('Email');
const password = document.getElementById('Password');
const confirmpassword = document.getElementById('ConfirmPassword');
const submitBtn = document.querySelector('button[type="submit"]');

submitBtn.addEventListener('click', (e) => {
  e.preventDefault();
  validateInput();
});

function validateInput() {
  const firstnameValue = firstname.value.trim();
  const lastnameValue = lastname.value.trim();
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const confirmpasswordValue = confirmpassword.value.trim();
  
  let arr = [];
  
  if(firstnameValue === '') {
    setError(firstname, 'First name cannot be blank');
  }else if(!isValidName(firstnameValue)) {
    setError(firstname, 'First name is not valid');
  }else {
    setSuccess(firstname);
    arr.push(true);
  }
  
  if(lastnameValue === '') {
    setError(lastname, 'Last name cannot be blank');
  }else if(!isValidName(lastnameValue)) {
    setError(lastname, 'Last name is not valid');
  } else {
    setSuccess(lastname);
    arr.push(true);
  }
  
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
  
  if(confirmpasswordValue === '') {
    setError(confirmpassword, 'Confirm password cannot be blank');
  } else if(passwordValue !== confirmpasswordValue) {
    setError(confirmpassword, 'Passwords do not match');
  } else {
    setSuccess(confirmpassword);
    arr.push(true);
  }
  
  if (arr.length === 5) {
    form.submit();
  }
}

function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidName(name){
  return /^[A-Za-z]+([- ][A-Za-z]+)*$/.test(name)
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