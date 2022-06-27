const Username = document.querySelector(".Username");
const Fullname = document.querySelector(".Fullname");
const Email = document.querySelector(".Email");
const Password = document.querySelector(".Password");
const CPassword = document.querySelector(".CPassword");
const signup = document.querySelector(".signup");


signup.addEventListener('submit', (e)=>{
    e.preventDefault();

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
        console.log(data);
    })
    .catch((error)=>{
        console.log(error);
    })
})