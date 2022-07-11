const Username = document.querySelector(".Username");
const Password = document.querySelector(".Password");
const login = document.querySelector(".login");
const finalMessage = document.querySelector(".finalMessage");
const login_loginBtn = document.querySelector(".login_loginBtn");

login.addEventListener('submit', (e)=>{
    e.preventDefault();

    login_loginBtn.innerHTML = `<i class="fa fa-spinner"></i>`;
    login_loginBtn.disabled = true;

    let Details = {
        "Username": Username.value,
        "Password": Password.value
    };

    fetch("../api/login.php", {
        method: "POST",
        headers:{
            "Content-Type": "application/json"
        },
        body: JSON.stringify(Details)
    })
    .then(res=>res.json())
    .then((data)=>{
        login_loginBtn.innerHTML = "Login";
        login_loginBtn.disabled = false;
        if(data == "Success"){
            localStorage.setItem('__hz_username', Username.value);
            window.location = "../workarea";
        }
        else if(data == "0x1MIS"){
            finalMessage.style.transform = "translateX(0%)";

            finalMessage.innerHTML = "Invalid Password";
            setTimeout(() => {
                finalMessage.style.transform = "translateX(200%)";
            }, 4000);
        }
        else if(data == "0x1DBE"){
            finalMessage.style.transform = "translateX(0%)";

            finalMessage.innerHTML = "No Such User Found";
            setTimeout(() => {
                finalMessage.style.transform = "translateX(200%)";
            }, 4000);
        }
    })
    .catch((error)=>{
        console.log(error);
        login_loginBtn.innerHTML = "Login";
        login_loginBtn.disabled = false;
    })
})