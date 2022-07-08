const Username = document.querySelector(".Username");
const Fullname = document.querySelector(".Fullname");
const Email = document.querySelector(".Email");
const Password = document.querySelector(".Password");
const CPassword = document.querySelector(".CPassword");
const signup = document.querySelector(".signup");
const signupBtn = document.querySelector(".signup_signupBtn");
const passwordGuide = document.querySelector(".passwordGuide");
const messageBar = document.querySelector(".messageBar");
const signup_signupBtn = document.querySelector(".signup_signupBtn");

window.onload = () => {
    signupBtn.disabled = true;
    signupBtn.style.opacity = 0.4;
}

/**
 * Regular Expressions For Validations
 */
 const validEmail = /[a-zA-Z_\.\-_0-9]{3,}[@][a-z]{2,}[\.][a-z]{2,}/;
 const validUsername = /^[a-zA-Z_\-]{4,}$/;
 const validPassword = /(?=.*[\W])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9\W]{8,}/;
 const validName = /^[a-zA-Z ]+$/;

 function disableBtn(buttonEle, condition, Opacity){
     buttonEle.disabled = condition;
     buttonEle.style.opacity = Opacity;
 }

 const checkIfEmpty = (element1, element2, element3, element4, element5) => {
     element1Val = element1.value; element2Val = element2.value; element3Val = element3.value; element4Val = element4.value;
     element5Val = element5.value;
     if((element1Val == "" && !(element1Val.match(validUsername))) || (element2Val == "" && !(element2Val.match(validName))) || (element3Val == "" && !(element3Val.match(validEmail))) || (element4Val == "" && !(element4Val.match(validPassword))) || element5Val == "" && !(element5Val.match(validPassword))){
        return false;
     }
     else{
        return true;
     }
 }

 const testingInputs = (choosenElement, expression) => {
     let theText = choosenElement.value;
     if(!(theText.match(expression))){
         choosenElement.style.borderBottom = "2px solid red";
         disableBtn(signupBtn, true, 0.4);
     }
     else{
         choosenElement.style.borderBottom = null;

         if(!(checkIfEmpty(Username, Fullname, Email, Password, CPassword))){
            disableBtn(signupBtn, true, 0.4);
         }
         else{
             disableBtn(signupBtn, false, null);
         }
     }
 }

Username.addEventListener('keyup', (e)=>{
    testingInputs(Username, validUsername);
})

Fullname.addEventListener('keyup', (e)=>{
    testingInputs(Fullname, validName);
})

Email.addEventListener('keyup', (e)=>{
    testingInputs(Email, validEmail);
})

Password.addEventListener('keyup', (e)=>{
    testingInputs(Password, validPassword);
    passwordGuide.style.display = "block";
})

CPassword.addEventListener('keyup', (e)=>{
    testingInputs(CPassword, validPassword);
    if(!(CPassword.value === Password.value)){
        CPassword.style.borderBottom = "2px solid red";
        disableBtn(signupBtn, true, 0.4);
    }
    else{
        CPassword.style.borderBottom = null;

        if(!(checkIfEmpty(Username, Fullname, Email, Password, CPassword))){
            disableBtn(signupBtn, true, 0.4);
         }
         else{
             disableBtn(signupBtn, false, null);
         }
    }
})

signup.addEventListener('submit', (e)=>{
    e.preventDefault();

    signup_signupBtn.innerHTML = `<i class="fa fa-spinner"></i>`;
    signup_signupBtn.disabled = true;

    let Details = {
        "Fullname": Fullname.value,
        "Username": Username.value,
        "Email": Email.value,
        "Password": Password.value,
        "Confirm_password": CPassword.value
    };

    fetch("../api/signup.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(Details)
    })
    .then(res=>res.json())
    .then((data)=>{
        signup_signupBtn.innerHTML = `Sign Up`;
        signup_signupBtn.disabled = false;
        if(data == "Success"){
            messageBar.style.transform = "translateX(0%)";

            messageBar.innerHTML = "Success!! You've Signed Up, Please Login";
            setTimeout(() => {
                messageBar.style.transform = "translateX(200%)";
            }, 6000);
        }
        else if(data == "0x1EX"){
            messageBar.style.transform = "translateX(0%)";

            messageBar.innerHTML = "Oops!! This Username is already available";
            setTimeout(() => {
                messageBar.style.transform = "translateX(200%)";
            }, 6000);
        }
        else if(data == "0x1MIS"){
            messageBar.style.transform = "translateX(0%)";

            messageBar.innerHTML = "The Passwords Do Not Match";
            setTimeout(() => {
                messageBar.style.transform = "translateX(200%)";
            }, 6000);
        }
    })
    .catch((error)=>{
        console.log(error);
        signup_signupBtn.innerHTML = `Sign Up`;
        signup_signupBtn.disabled = false;
    })
})