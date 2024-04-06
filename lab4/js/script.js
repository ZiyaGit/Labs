/*
Student Name: Ziya Gurel
Student Number 041128093
Lab4 JavaScript FILE
*/

//DOM element references
let emailField = document.querySelector("#email");
let usernameField = document.querySelector("#login");
let passwordInput = document.querySelector('#pass');
let retypePasswordInput = document.querySelector('#pass2');
let termsCheckbox = document.querySelector('#terms');

//email error section
let emailError = document.createElement('p');
emailError.style.color = "red";
document.querySelectorAll(".textfield")[0].append(emailError);
emailError.style.marginTop = "8px";

//username error section
let usernameError = document.createElement('p');
usernameError.style.color = "red";
document.querySelectorAll(".textfield")[1].append(usernameError);
usernameError.style.marginTop = "8px";

//password error section
let passwordError = document.createElement('p');
passwordError.style.color = "red";
document.querySelectorAll(".textfield")[2].append(passwordError);
passwordError.style.marginTop = "8px";

//retype-password error section
let retypePasswordError = document.createElement('p');
retypePasswordError.style.color = "red";
document.querySelectorAll(".textfield")[3].append(retypePasswordError);
retypePasswordError.style.marginTop = "8px";

//term-checkbox error section
let termsCheckBox = document.createElement('span');
termsCheckBox.style.color = "red";
termsCheckBox.style.marginLeft = "10px";
document.querySelectorAll(".checkbox")[1].append(termsCheckBox);

//global default message placeholder
let defaultText = "";

//method to validate email
let emailErrorMsg = "X Email format should be xyz@xyz.xyz.";
let emailEmpty = "X Email address should be non-empty with the format xyz@xyz.xyz.";
function vaildateEmail(){
  let email = emailField.value; 
  let regexp = /^\S+@\S+\.\S+$/; 
  if(regexp.test(email)) { 
    emailField.style.border = "2px solid gainsboro";
    emailField.style.borderRadius = "4px";
    error = defaultText;
  }
  else if (email == "") {
    emailField.style.border = "2px solid red";
    error = emailEmpty;
  }
  else {
    emailField.style.border = "2px solid red";
    error = emailErrorMsg;
  }
  return error;
}

//method to validate username
let usernameEmpty = "X User name should be non-empty."
let usernameErrorMsg = "X Username should be less than 30 characters."

function vaildateUsername(){
  let username = usernameField.value; 
  let regexp = /^.{1,29}$/;
  if(regexp.test(username)) { 
    usernameField.style.border = "2px solid gainsboro";
    usernameField.style.borderRadius = "4px";
    error = defaultText;
  }
  else if (username == "") {
    usernameField.style.border = "2px solid red";
    error = usernameEmpty;
  }
  else {
    usernameField.style.border = "2px solid red";
    error = usernameErrorMsg;
  }
  return error;
}

//method to validate password
let passwordEmpty = "X Password should not be empty."
let passwordErrorMsg = "X Password should be at least 8 characters."
function validatePassword() {
  let password = passwordInput.value;
  let regexp = /^.{8,}$/;
  if (regexp.test(password)) {
    passwordInput.style.border = "2px solid gainsboro";
    passwordInput.style.borderRadius = "4px";
    error = defaultText;
  }
  else if(password == "") {
    passwordInput.style.border = "2px solid red";
    error = passwordEmpty;
  }
  else {
    passwordInput.style.border = "2px solid red";
    error = passwordErrorMsg;
  }
  return error;
}

//method to validate retype-password
let retypePasswordEmpty = "X Please retype password."
let retypePasswordErrorMsg = "X Password does not match."
function validateRetypePassword() {
  let passwordRetype = retypePasswordInput.value;
  let password = passwordInput.value;

  if (password === "" && passwordRetype === "") {
    retypePasswordInput.style.border = "2px solid red";
    error = retypePasswordEmpty; 
  } 
  else if (passwordRetype === "") {
    retypePasswordInput.style.border = "2px solid red";
    error = retypePasswordEmpty; 
  } 
  else if (passwordRetype !== password) {
    retypePasswordInput.style.border = "2px solid red";
    error = retypePasswordErrorMsg;
  } 
  else {
    retypePasswordInput.style.border = "2px solid gainsboro";
    retypePasswordInput.style.borderRadius = "4px";
    error = ""; // Passwords match
  }
  return error;
}

//method to validate the terms 
let termsOfValidationErrorMsg = "X Please accept the terms and conditions";
function validatTerms(){
  if(termsCheckbox.checked)
  return defaultText;
  else{
    
  }
  return termsOfValidationErrorMsg;
}


//event handler for submit event
function validate(){
  let valid = true;

//email onsubmit
  if(vaildateEmail() !== defaultText){
    emailError.textContent = vaildateEmail();
    valid = false;
  } 

  //username onsubmit
  if(vaildateUsername() !== defaultText){
    usernameError.textContent = vaildateUsername();
    valid = false;
  } 

  //password onsubmit
  if(validatePassword() !== defaultText){
    passwordError.textContent = validatePassword();
    valid = false;
  }

  //retype-password onsubmit
  if(validateRetypePassword() !== defaultText){
    retypePasswordError.textContent = validateRetypePassword();
    valid = false;
  }

  //term onsubmit
  let termsOfValidation=validatTerms();
  if(termsOfValidation!==defaultText) {
    termsCheckBox.textContent=termsOfValidation;
    valid = false;
  }
  return valid;
};

// event listner to empty the text input
const inputs = document.querySelectorAll("input");
function reserFormError(){
  emailError.textContent = defaultText;
  usernameError.textContent = defaultText;
  passwordError.textContent = defaultText;
  retypePasswordError.textContent = defaultText;
  termsCheckBox.textContent = defaultText;
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].style.border = "2px solid gainsboro";
    inputs[i].style.borderRadius = "4px";
  }
}
document.querySelector('.formcontainer form').addEventListener("reset",reserFormError);

//event listner for email 
emailField.addEventListener("blur",()=>{
  let error = vaildateEmail();
  if(error == defaultText) {
    emailError.textContent = "";
  }
  else if(error == emailEmpty){
    emailError.textContent = emailEmpty;
  }
  else {
    emailError.textContent = emailErrorMsg;
  }
});

emailField.addEventListener("input",()=>{ 
  emailError.textContent = defaultText;
});
   
//event listner for username 
usernameField.addEventListener("blur",()=>{
  let error = vaildateUsername();
  if(error == defaultText){
    usernameError.textContent = "";
  }
  else if(error == usernameEmpty ){
    usernameError.textContent = usernameEmpty;
  }
  else {
    usernameError.textContent = usernameErrorMsg;
  }
});

usernameField.addEventListener("input",()=>{ 
  usernameError.textContent = defaultText;
});

//event listner for password
passwordInput.addEventListener("blur",()=>{ 
  let error = validatePassword();
  if(error == defaultText) {
    passwordError.textContent = "";
  }
  else if(error == passwordEmpty ) {
    passwordError.textContent = passwordEmpty;
  }
  else {
    passwordError.textContent = passwordErrorMsg;
  }
});

passwordInput.addEventListener("input",()=>{ 
  passwordError.textContent = defaultText;
});

//event listner for retype-password
retypePasswordInput.addEventListener("blur",()=>{
  let error = validateRetypePassword();
  if (error === defaultText){
    retypePasswordError.textContent = "";
  }
  else if(error === retypePasswordErrorMsg) {
    retypePasswordError.textContent = retypePasswordErrorMsg;
  }
  else if(error === retypePasswordEmpty ) {
    retypePasswordError.textContent = retypePasswordEmpty;
  }
});

retypePasswordInput.addEventListener("input",() => { 
retypePasswordError.textContent = defaultText;
});

//event listner for terms check-box
termsCheckbox.addEventListener("change", function() {
  if(termsCheckbox.checked) {
    termsCheckBox.textContent = defaultText;
  }
});

//add event Newsletter checkbox warning
let newsLetter = document.querySelector('#newsletter');
newsLetter.addEventListener("change", () => {
  if(newsLetter.checked){
    alert('Possible spam may appear when you choose this field!')
  }
});