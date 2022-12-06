var state = false;
let password = document.getElementById('password');
let submit_button = document.getElementById('submit_button');
let changepasseye = document.getElementById('changepasseye');
function toggle() {
    if (state){
        password.setAttribute("type", "password");
        changepasseye.src="https://i.imgur.com/d1M6y1W.jpg";
        state = false;
    } else { 
        password.setAttribute("type", "text");
        changepasseye.src="https://i.imgur.com/i8SxZqd.jpg";
        state = true;
    }
}


let random_password = document.querySelector('.random_password');
var passwordLength = 10;
var passwordVal = "";

window.onload = function loadPassword() {

    let randomGenerateChars = "B&vp3hSMQQsu#sR2+mTJx6kf6kHhHk^nNceWW_$=tEG#";

    for (var i = 0; i < passwordLength; i++) {
        let randomNumber = Math.floor(Math.random() * randomGenerateChars.length);
        passwordVal += randomGenerateChars.substring(randomNumber, randomNumber + 1);
    }
    random_password.innerHTML = "Password suggestion - "+passwordVal;
};

password.addEventListener('focus', function() { 
   
    if (password.value === '') {
        random_password.style.display = 'block';
        
    }
});


random_password.addEventListener('click', function() {
    password.value = passwordVal;
    random_password.style.display = 'none';
});