const Username = document.querySelector(".Username");
const Password = document.querySelector(".Password");
const login = document.querySelector(".login");

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
        console.log(data);
    })
    .catch((error)=>{
        console.log(error);
    })
})