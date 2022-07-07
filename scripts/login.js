const Username = document.querySelector(".Username");
const Password = document.querySelector(".Password");
const login = document.querySelector(".login");
const finalMessage = document.querySelector(".finalMessage");

login.addEventListener('submit', (e)=>{
    e.preventDefault();

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
        if(data == "Success"){
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
    })
})