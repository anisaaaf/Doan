const loginBtn = document.querySelector(".btnLogin-popup");
const closeBtn = document.querySelector(".icon-close");
const loginCtn = document.querySelector(".wrapper");
const registerLink = document.querySelector(".register-link");
const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link")

wrapper.style.display = "none";

function showHideElement() {
    if (loginCtn.style.display === "none") {
        loginCtn.style.display = "block";
    } else {
        loginCtn.style.display = "none";
    }
  }

closeBtn.addEventListener("click", ()=>{
    loginCtn.style.display = "none";
    wrapper.classList.remove("active");
})

loginBtn.addEventListener("click", ()=>{
    showHideElement();
})

registerLink.addEventListener("click",()=>{
    wrapper.classList.add("active");
})

loginLink.addEventListener("click",()=>{
    wrapper.classList.remove("active");
})

let errorCount = 0
function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    let emailError = document.getElementById("email-error")
    let passwordError = document.getElementById("password-error")

    
    if (email.trim() === "") {
        emailError.innerHTML = "Please enter your email."
        emailError.style.display = "block"
        errorCount ++
        return;
    } else {
        emailError.innerHTML = ""
        emailError.style.display = "none"
        errorCount--
    }

    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;

    if (!emailPattern.test(email)) {
        emailError.innerHTML = "Invalid email format. Please enter a valid email address."
        emailError.style.display = "block"
        return;
    }  else {
        emailError.innerHTML = ""
        emailError.style.display = "none"
        errorCount--
    }


    
    if (password.trim() === "") {
        passwordError.innerHTML = "Please enter your password."
        passwordError.style.display = "block"
        errorCount ++
        return;
    }  else {
        passwordError.innerHTML = ""
        passwordError.style.display = "none"
        errorCount--
    }

    if (password.length < 8) {
        passwordError.innerHTML = "Password must be at least 8 characters long."
        passwordError.style.display = "block"
        errorCount ++
        return;
    }   else {
        passwordError.innerHTML = ""
        passwordError.style.display = "none"
        errorCount--
    }

    if(errorCount > 0){
        alert("Form is invalid! fix the error.");
    }
    alert("Form is valid! You can submit it.");
}

let resigterErrorCount = 0
function validateRegisterForm() {
    var username = document.getElementById('register-username').value;
    var email = document.getElementById('register-email').value;
    var password = document.getElementById('register-password').value;
    let usernameError = document.getElementById("username-register-error")
    let emailError = document.getElementById("email-register-error")
    let passwordError = document.getElementById("password-register-error")

    
    if (username.trim() === "") {
        usernameError.innerHTML = "Please enter your username."
        usernameError.style.display = "block"
        resigterErrorCount ++
        return;
    } else {
        usernameError.innerHTML = ""
        usernameError.style.display = "none"
        resigterErrorCount--
    }

    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;

    if (!emailPattern.test(email)) {
        emailError.innerHTML = "Invalid email format. Please enter a valid email address."
        emailError.style.display = "block"
        return;
    }  else {
        emailError.innerHTML = ""
        emailError.style.display = "none"
        errorCount--
    }


    
    if (password.trim() === "") {
        passwordError.innerHTML = "Please enter your password."
        passwordError.style.display = "block"
        errorCount ++
        return;
    }  else {
        passwordError.innerHTML = ""
        passwordError.style.display = "none"
        errorCount--
    }

    if (password.length < 8) {
        passwordError.innerHTML = "Password must be at least 8 characters long."
        passwordError.style.display = "block"
        errorCount ++
        return;
    }   else {
        passwordError.innerHTML = ""
        passwordError.style.display = "none"
        errorCount--
    }

    if(resigterErrorCount > 0){
        alert("Form is invalid! fix the error.");
    }
    alert("Form is valid! You can submit it.");
}

 