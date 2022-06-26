/**
 * Variables For All Elements
 */
const loginBtn = document.querySelectorAll('.loginBtn');
const signupBtn = document.querySelectorAll('.signupBtn');

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