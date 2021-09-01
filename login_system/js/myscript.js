//
const _input = document.querySelectorAll('input');
const _select = document.querySelectorAll("label");

_input.forEach((_this) => {
    if (_this.value.length >= 1) {
        document.querySelectorAll("label").classList.add("labelValid");
    } else {
        document.querySelectorAll("label").classList.remove("labelValid");
    }
});
// eye
function toggle(){
    
    let password = document.querySelector('#password');
    let toggle = document.querySelector('.fa-eye');
    
    const error = document.querySelector("#error-box");
    
    // Password attribute
    // this will not show suggestion
    if(password.value.length == 0){
        password.setAttribute('type', 'password');
        document.querySelector('.fa').style.display = "none";
        toggle.classList.toggle('fa-eye-slash');
    }
    else if (password.value.length <= 0) {
        document.querySelector('.fa').style.display = "none";
    }
    else {
        document.querySelector('.fa').style.display = "block";
    }
   
}
// Hide/show
function hideShow(){
    let password = document.querySelector('#password');
    let toggle = document.querySelector('.fa-eye');

    if (password.type === "password") {
            toggle.classList.toggle('fa-eye-slash');
            password.setAttribute('type', 'text');
    }
    else{
        password.setAttribute('type', 'password');
        toggle.classList.toggle('fa-eye-slash');
    }
    
}

// confirm password

let password = document.querySelector('#password');
let $cPassword = document.querySelector('#c-password'); 

function cPassword()
{
    if (password.value != $cPassword.value) {
        document.querySelector('#error-box').classList.add('fa-times');
        document.querySelector('#error-box').classList.remove('fa-check');
        return false;
    }
    else{
        document.querySelector('#error-box').classList.remove('fa-times');
        document.querySelector('#error-box').classList.add('fa-check');
        true;
    }
} 