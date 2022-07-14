const switchMode = document.querySelector('.switchMode');
const user_fullname = document.querySelector('.user_fullname');

let currentTheme = localStorage.getItem('Hazlo_Theme');
let givenUsername = localStorage.getItem('__hz_username');

if(givenUsername == null){
    location = "../login/";
}

(function doFirst(){
    if(currentTheme == null){
        document.body.classList.remove("darkMode");
        switchMode.innerHTML = `<i class="fa fa-moon"></i>`;
    }
    else{
        document.body.classList.add("darkMode");
        switchMode.innerHTML = `<i class="fa fa-sun"></i>`;
    }
})()

switchMode.addEventListener('click', (e)=>{
    if(currentTheme == null){
        localStorage.setItem('Hazlo_Theme', 'Darkmode');
        currentTheme = localStorage.getItem('Hazlo_Theme');
        document.body.classList.add("darkMode");
        switchMode.innerHTML = `<i class="fa fa-sun"></i>`;
    }
    else{
        localStorage.removeItem('Hazlo_Theme');
        currentTheme = localStorage.getItem('Hazlo_Theme');
        document.body.classList.remove("darkMode");
        switchMode.innerHTML = `<i class="fa fa-moon"></i>`;
    }
});

var typer = new Typed("#workarea_motto_catchphrases", {
    strings: [
        ", Done!",
        ", Organized!"
    ],
    typeSpeed: 70,
    backSpeed: 40,
    loop: true
});


// console.log(givenUsername);

fetch('../api/getinfo.php', {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        'username': givenUsername
    })
})
.then(res=>res.json())
.then((data)=>{
    // console.log(data);
    let {fullname, username, email} = data;
    user_fullname.innerHTML = fullname;
    localStorage.removeItem('__hz_username');
})
.catch((error)=>{
    console.log(error);
});
