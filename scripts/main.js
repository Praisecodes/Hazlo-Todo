var typed = new Typed("#catchPhrases", {
    strings: [
        "ORGANIZED",
        "ON TIME",
        "PRODUCTIVE",
        "CONSERVATIVE"
    ],
    typeSpeed: 50,
    backSpeed: 50,
    loop: true
});

var typer = new Typed("#loginPhrase", {
    strings: [
        "Get Started With Hazlo Todo",
        "Check On Your Activities",
        "View Your Activities",
        "Organize Your Activities"
    ],
    typeSpeed: 50,
    backSpeed: 50,
    loop: true
});

const Info = document.querySelector(".info");
const form = document.querySelector(".contact");
const socials = document.querySelector(".social");
const mailingListEmail = document.querySelector(".mailingListEmail");
const mailingListEmailLabel = document.querySelector(".mailListLabel");
const home = document.querySelectorAll(".home");
const about = document.querySelectorAll(".about");
const support = document.querySelectorAll(".support");
const contactTop = document.querySelectorAll(".contact-top");
const LoginBtn = document.querySelector(".login");
const SignUpBtn = document.querySelector(".signUp");
const CloseLogin = document.querySelector(".closeLogin");
const CloseSignUp = document.querySelector(".closeSignUp");
const LoginModal = document.querySelector(".loginModal");
const SignUpModal = document.querySelector(".signUpModal");
const landingSignUp = document.querySelector(".landingSignUp");
const infoSignUp = document.querySelector(".infoSignUp");
const usernameLogin = document.querySelector(".usernameLogin");
const emailLogin = document.querySelector(".emailLogin");
const passwordLogin = document.querySelector(".passwordLogin");
const passwordLabelLogin = document.querySelector(".passwordLabelLogin");
const emailLabelLogin = document.querySelector(".emailLabelLogin");
const nameLabelLogin = document.querySelector(".nameLabelLogin");
const message = document.querySelector(".message");
const infoDiv = document.querySelector(".infoDiv");
const Firstname = document.querySelector(".Firstname");
const LastName = document.querySelector(".LastName");
const OtherNames = document.querySelector(".OtherNames");
const usernameSignup = document.querySelector(".usernameSignup");
const passwordSignup = document.querySelector(".passwordSignup");
const confirmPassword = document.querySelector(".confirmPassword");
const emailSignup = document.querySelector(".emailSignup");
const gender = document.querySelector(".gender");
const submitSignup = document.querySelector(".submitSignup");
const navBtn = document.querySelector(".navBtn");
const mobileNavContainer = document.querySelector(".mobileNavContainer");
const mobileNav = document.querySelector(".mobileNav");
const closeNav = document.querySelector(".closeNav");
const loginMobile = document.querySelector(".loginMobile");
const signupMobile = document.querySelector(".signupMobile");

const validEmail = /[a-zA-Z0-9\.\-_]+[@][a-z]{2,}[\.][a-z]{2,}/
const validUsername = /^[a-zA-Z]+$/
const validPassword = /(?=.*[_\.\-@])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9_\-\.@]{8,}/
const othernameValid = /^[a-zA-Z ]+$/
const usernameValid = /^[a-zA-Z0-9\-_]+$/


window.onscroll = () =>{
    if(scrollY >= 100){
        Info.classList.add("MoveInright");
        Info.classList.remove("Showright");
        form.classList.add("MoveInleft");
        form.classList.remove("Showleft");
    }

    if(scrollY >=500){
        socials.classList.add("MoveInup");
        socials.classList.remove("Showdown");
    }
}

mailingListEmail.addEventListener('keyup', (e)=>{
    let mailingListEmailValue = mailingListEmail.value;

    if(validEmail.test(mailingListEmailValue)){
        mailingListEmail.style.borderBottom = "2px solid #0f0";
        mailingListEmailLabel.textContent = ""
    }
    else if(mailingListEmailValue == ""){
        mailingListEmailLabel.textContent = ""
        mailingListEmail.style.borderBottom = "2px solid white";
    }
    else{
        mailingListEmailLabel.textContent = "Invalid Email Address";
        mailingListEmail.style.borderBottom = "2px solid #f00";
    }
});

about.forEach((e)=>{
    e.addEventListener('click', (er)=>{
        Info.scrollIntoView({
            behavior: 'smooth'
        });
        mobileNav.classList.add("right");
        mobileNav.classList.remove("left");
        setTimeout(() => {
            mobileNavContainer.style.display = "none";
        }, 500);
    });
});

contactTop.forEach((e)=>{
    e.addEventListener('click', (er)=>{
        socials.scrollIntoView({
            behavior: 'smooth'
        });
        mobileNav.classList.add("right");
        mobileNav.classList.remove("left");
        setTimeout(() => {
            mobileNavContainer.style.display = "none";
        }, 500);
    });
});

const OpenSignUp = () =>{
    mobileNav.classList.add("right");
    mobileNav.classList.remove("left");
    setTimeout(() => {
        mobileNavContainer.style.display = "none";
    }, 500);
    document.querySelector(".modalContainer").style.display = "flex";
    SignUpModal.style.display = "flex";
    document.body.style.overflowY = "hidden";
}

LoginBtn.addEventListener('click', (e)=>{
    mobileNav.classList.add("right");
    mobileNav.classList.remove("left");
    setTimeout(() => {
        mobileNavContainer.style.display = "none";
    }, 500);
    document.querySelector(".modalContainer").style.display = "flex";
    LoginModal.style.display = "flex";
    document.body.style.overflowY = "hidden";
});

loginMobile.addEventListener('click', (e)=>{
    mobileNav.classList.add("right");
    mobileNav.classList.remove("left");
    setTimeout(() => {
        mobileNavContainer.style.display = "none";
    }, 500);
    document.querySelector(".modalContainer").style.display = "flex";
    LoginModal.style.display = "flex";
    document.body.style.overflowY = "hidden";
});

SignUpBtn.addEventListener('click', OpenSignUp);
landingSignUp.addEventListener('click', OpenSignUp);
infoSignUp.addEventListener('click', OpenSignUp);
signupMobile.addEventListener('click', OpenSignUp);

CloseLogin.addEventListener('click', (e)=>{
    LoginModal.classList.remove("FadeIn");
    LoginModal.classList.add("FadeOut");
    setTimeout(()=>{
        LoginModal.style.display = "none";
        document.querySelector(".modalContainer").style.display = "none";
        LoginModal.classList.remove("FadeOut");
        LoginModal.classList.add("FadeIn");
        document.body.style.overflowY = "auto";
    }, 500);
    usernameLogin.value = "";
    usernameLogin.style.borderBottom = "2px solid #324953";
    emailLogin.value = "";
    emailLogin.style.borderBottom = "2px solid #324953";
    passwordLogin.value = "";
    passwordLogin.style.borderBottom = "2px solid #324953";
    nameLabelLogin.textContent = "";
    emailLabelLogin.textContent = "";
    passwordLabelLogin.textContent = "";
});

CloseSignUp.addEventListener('click', (e)=>{
    SignUpModal.classList.remove("FadeIn");
    SignUpModal.classList.add("FadeOut");
    setTimeout(()=>{
        SignUpModal.style.display = "none";
        document.querySelector(".modalContainer").style.display = "none";
        SignUpModal.classList.remove("FadeOut");
        SignUpModal.classList.add("FadeIn");
        document.body.style.overflowY = "auto";
    }, 500);
    message.textContent = "";
    infoDiv.classList.add("Showdown");
    infoDiv.classList.remove("MoveInup");
    Firstname.style.borderBottom = "2px solid #324953";
    Firstname.value = "";
    LastName.style.borderBottom = "2px solid #324953";
    LastName.value = "";
    OtherNames.style.borderBottom = "2px solid #324953";
    OtherNames.value = "";
    usernameSignup.style.borderBottom = "2px solid #324953";
    usernameSignup.value = "";
    passwordSignup.style.borderBottom = "2px solid #324953";
    passwordSignup.value = "";
    confirmPassword.style.borderBottom = "2px solid #324953";
    confirmPassword.value = "";
    emailSignup.style.borderBottom = "2px solid #324953";
    emailSignup.value = "";
    gender.style.borderBottom = "2px solid #324953";
    gender.value = "";
});

usernameLogin.addEventListener('keyup', (e)=>{
    let usernameLoginVal = usernameLogin.value;

    if(usernameValid.test(usernameLoginVal)){
        usernameLogin.style.borderBottom = "2px solid #0f0";
        nameLabelLogin.textContent = "";
    }
    else if(usernameLoginVal == ""){
        nameLabelLogin.textContent = "This Field Cannot Be Empty";
        usernameLogin.style.borderBottom = "2px solid #f00";
    }
    else{
        nameLabelLogin.textContent = "Username Can Only Contain Alphanumeric and - or _";
        usernameLogin.style.borderBottom = "2px solid #f00";
    }
});

emailLogin.addEventListener('keyup', (e)=>{
    let emailLoginVal = emailLogin.value;

    if(validEmail.test(emailLoginVal)){
        emailLogin.style.borderBottom = "2px solid #0f0";
        emailLabelLogin.textContent = "";
    }
    else if(emailLoginVal == ""){
        emailLabelLogin.textContent = "This Field Cannot Be Empty";
        emailLogin.style.borderBottom = "2px solid #f00";
    }
    else{
        emailLabelLogin.textContent = "Invalid Email Format";
        emailLogin.style.borderBottom = "2px solid #f00";
    }
});

passwordLogin.addEventListener('keyup', (e)=>{
    let passwordLoginVal = passwordLogin.value;

    if(passwordLoginVal == ""){
        passwordLabelLogin.textContent = "Cannot Be Left Empty";
        passwordLogin.style.borderBottom = "2px solid #f00";
    }
    else{
        passwordLabelLogin.textContent = "";
        passwordLogin.style.borderBottom = "2px solid #0f0";
    }
});

const SignUpActions = (theField, RegExexpression, passedMessage, warningMessage) =>{
    let FieldValue = theField.value;

    if(RegExexpression.test(FieldValue)){
        message.textContent = "";
        theField.style.borderBottom = "2px solid #0f0";
        infoDiv.classList.add("Showdown");
        infoDiv.classList.remove("MoveInup");
    }
    else if(FieldValue == ""){
        theField.style.borderBottom = "2px solid #f00";
        infoDiv.style.display = "flex";
        message.textContent = passedMessage;
        infoDiv.classList.add("MoveInup");
        infoDiv.classList.remove("Showdown");
    }
    else{
        theField.style.borderBottom = "2px solid #f00";
        infoDiv.style.display = "flex";
        message.textContent = warningMessage;
        infoDiv.classList.add("MoveInup");
        infoDiv.classList.remove("Showdown");
    }
}

Firstname.addEventListener('keyup', (e)=>{
    SignUpActions(Firstname, validUsername, "First Name Cannot Be Empty", "First Name Cannot Contain Digits, Space or Symbols");
});

LastName.addEventListener('keyup', (e)=>{
    SignUpActions(LastName, validUsername, "Last Name Cannot Be Empty", "Last Name Cannot Contain Digits, Space or Symbols");
});

OtherNames.addEventListener('keyup', (e)=>{
    SignUpActions(OtherNames, othernameValid, "Other Names Cannot Be Empty", "Other Names Cannot Contain Digit or Symbols");
});

usernameSignup.addEventListener('keyup', (e)=>{
    SignUpActions(usernameSignup, usernameValid, "Username Cannot Be Empty", "Username Can Only Contain Alphanumeric And - or _");
});

passwordSignup.addEventListener('keyup', (e)=>{
    SignUpActions(passwordSignup, validPassword, "Password Feild Cannot Be Empty", "Password Must Contain At Least One Of These (., -, _, @) And A Digit");
});

confirmPassword.addEventListener('keyup', (e)=>{
    let confirmPasswordVal = confirmPassword.value;

    if(confirmPasswordVal == passwordSignup.value){
        confirmPassword.style.borderBottom = "2px solid #0f0";
        message.textContent = "";
        infoDiv.classList.add("Showdown");
        infoDiv.classList.remove("MoveInup");
    }
    else if(confirmPasswordVal == ""){
        confirmPassword.style.borderBottom = "2px solid #f00";
        infoDiv.style.display = "flex";
        message.textContent = "Confirm Password Field Cannot Be Empty";
        infoDiv.classList.add("MoveInup");
        infoDiv.classList.remove("Showdown");
    }
    else{
        confirmPassword.style.borderBottom = "2px solid #f00";
        infoDiv.style.display = "flex";
        message.textContent = "The Passwords Don't Match";
        infoDiv.classList.add("MoveInup");
        infoDiv.classList.remove("Showdown");
    }
});

emailSignup.addEventListener('keyup', (e)=>{
    SignUpActions(emailSignup, validEmail, "Email Cannot Be Empty", "Invalid Email Format");
});

gender.addEventListener('keyup', (e)=>{
    let genderVal = gender.value;

    if(genderVal == "Male" || genderVal == "male" || genderVal == "Female" || genderVal == "female"){
        gender.style.borderBottom = "2px solid #0f0";
        message.textContent = "";
        infoDiv.classList.add("Showdown");
        infoDiv.classList.remove("MoveInup");
    }
    else if(genderVal == ""){
        gender.style.borderBottom = "2px solid #f00";
        infoDiv.style.display = "flex";
        message.textContent = "Gender Field Cannot Be Empty";
        infoDiv.classList.add("MoveInup");
        infoDiv.classList.remove("Showdown");
    }
    else{
        gender.style.borderBottom = "2px solid #f00";
        infoDiv.style.display = "flex";
        message.textContent = "Please Type 'Male' Or 'Female'";
        infoDiv.classList.add("MoveInup");
        infoDiv.classList.remove("Showdown");
    }
});

navBtn.addEventListener('click', (e)=>{
    mobileNavContainer.style.display = "block";
    setTimeout(() => {
        mobileNav.classList.add("left");
        mobileNav.classList.remove("right");
    }, 100);
});

closeNav.addEventListener('click', (e)=>{
    mobileNav.classList.add("right");
    mobileNav.classList.remove("left");
    setTimeout(() => {
        mobileNavContainer.style.display = "none";
    }, 500);
});
