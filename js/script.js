let navbtns = document.getElementById('navbtns');
navbtns.style.top = "-100%";
function togglemenu(){
    if(navbtns.style.top == "-100%"){
        navbtns.style.top = "60px";
    }
    else{
        navbtns.style.top = "-100%"
    }
}
// Start Dropdown Menu
let droplinks = document.querySelector('.droplinks');
document.querySelector('#drop-btn').onclick = () =>{
    droplinks.classList.toggle('active')
}
// End Dropdown Menu
//Start Image-Gallery

function myFunc(smallImgs){
    var fullImg = document.getElementById("big-img")
    fullImg.src = smallImgs.src
}
//End Image-Gallery

// Start Signup Form Validation

// Start Var Declaration
let fullName = document.getElementById("full-name");
let fullNameV = document.getElementById("fname-error");
let signupEmail = document.getElementById("signup-email");
let phoneNumber = document.getElementById("number");
let password = document.getElementById("password");
let passConfirm = document.getElementById("conf-password");

// End Var Declaration
fullName.onkeyup = function(){
    if(fullName.value === ""){
        fullNameV.innerHTML = "Full Name Is Required";
        fullNameV.style.color = "red";
    }
}



// End Signup Form Validation

