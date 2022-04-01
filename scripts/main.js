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

const Info = document.querySelector(".info");
const form = document.querySelector(".contact");
const socials = document.querySelector(".social");
const mailingListEmail = document.querySelector(".mailingListEmail");
const mailingListEmailLabel = document.querySelector(".mailListLabel");
const home = document.querySelector(".home");
const about = document.querySelector(".about");
const support = document.querySelector(".support");
const contactTop = document.querySelector(".contact-top");

const validEmail = /[a-zA-Z0-9\.\-_]+[@][a-z]{2,}[\.][a-z]{2,}/


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
        mailingListEmail.style.borderBottom = "2px solid #6e68a8";
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
