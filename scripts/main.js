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
const home = document.querySelector(".home");
const about = document.querySelector(".about");
const support = document.querySelector(".support");
const contactTop = document.querySelector(".contact-top");
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

const validEmail = /[a-zA-Z0-9\.\-_]+[@][a-z]{2,}[\.][a-z]{2,}/
const validUsername = /^[a-zA-Z]+$/
const validPassword = /(?=.*[_\.\-@]+)(?=.*[0-9]+)[a-zA-Z]{8,}/


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

about.addEventListener('click', (e)=>{
    Info.scrollIntoView({
        behavior: 'smooth'
    });
});

contactTop.addEventListener('click', (e)=>{
    socials.scrollIntoView({
        behavior: 'smooth'
    });
});

const OpenSignUp = () =>{
    document.querySelector(".modalContainer").style.display = "flex";
    SignUpModal.style.display = "flex";
    document.body.style.overflowY = "hidden";
}

LoginBtn.addEventListener('click', (e)=>{
    document.querySelector(".modalContainer").style.display = "flex";
    LoginModal.style.display = "flex";
    document.body.style.overflowY = "hidden";
});

SignUpBtn.addEventListener('click', OpenSignUp);
landingSignUp.addEventListener('click', OpenSignUp);
infoSignUp.addEventListener('click', OpenSignUp);

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
});

usernameLogin.addEventListener('keyup', (e)=>{
    let usernameLoginVal = usernameLogin.value;

    if(validUsername.test(usernameLoginVal)){
        usernameLogin.style.borderBottom = "2px solid #0f0";
        nameLabelLogin.textContent = "";
    }
    else if(usernameLoginVal == ""){
        nameLabelLogin.textContent = "This Field Cannot Be Empty";
        usernameLogin.style.borderBottom = "2px solid #f00";
    }
    else{
        nameLabelLogin.textContent = "Username Cannot Contain Digits Or Symbols And Spaces";
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
})
