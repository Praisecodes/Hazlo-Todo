/**
 * Variables For All Elements
 */
const loginBtn = document.querySelectorAll('.loginBtn');
const signupBtn = document.querySelectorAll('.signupBtn');
const mobileNavBtn = document.querySelector('.mobileNavBtn');
const mobileNavContainer = document.querySelector('.mobileNavContainer');
const mobileNavBar = document.querySelector('.mobileNavBar');
const closeNav = document.querySelector('.closeNav');

(function firstThingMain(){
    fetch("./api/rememberUser.php")
    .then(res=>res.json())
    .then((data)=>{
        if(!(data=="false")){
            localStorage.setItem("__hz_username", data);
            location = "./workarea/";
        }
    })
    .catch((error)=>{
        console.log(error);
    })
})()

const login = () => {
    window.location = "./login";
}

const signup = () => {
    window.location = "./signup";
}

loginBtn.forEach((Btn)=>{
    Btn.addEventListener('click', (e)=>{
        login();
    })
});

signupBtn.forEach((Btnn)=>{
    Btnn.addEventListener('click', (e)=>{
        signup();
    })
})

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

mobileNavBtn.addEventListener('click', (e)=>{
    mobileNavContainer.style.display = 'block';

    setTimeout(() => {
        mobileNavBar.style.transform = "translateX(0%)";
    }, 10);
});

closeNav.addEventListener('click', (e)=>{
    mobileNavBar.style.transform = "translateX(200%)";
    setTimeout(() => {
        mobileNavContainer.style.display = 'none';
    }, 500);
})