const switchMode = document.querySelector('.switchMode');
const user_fullname = document.querySelector('.user_fullname');
const signout = document.querySelector('.signout');
const icon_dropdown = document.querySelector('.icon_dropdown');
const mainDropdown = document.querySelector('.mainDropdown');

let currentTheme = localStorage.getItem('Hazlo_Theme');

(function doFirst(){
    if(currentTheme == null){
        document.body.classList.remove("darkMode");
        switchMode.innerHTML = `<i class="fa fa-moon"></i>`;
    }
    else{
        document.body.classList.add("darkMode");
        switchMode.innerHTML = `<i class="fa fa-sun"></i>`;
    }

    fetch("../api/rememberUser.php")
    .then(res=>res.json())
    .then((data)=>{
        if(data == "false"){
            location = "../login/";
        }
        else{
            localStorage.setItem('__hz_username', data);
            let givenUsername = localStorage.getItem('__hz_username');
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
                let {fullname, username, email} = data;
                user_fullname.innerHTML = fullname;
                localStorage.removeItem('__hz_username');
            })
            .catch((error)=>{
                console.log(error);
            });
        }
    })
    .catch((error)=>{
        console.log(error);
    });
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

signout.addEventListener('click', (e)=>{
    fetch('../api/signoutuser.php')
    .then(res=>res.json())
    .then(()=>{
        location = "../login/";
    })
    .catch((err)=>{
        console.log(err);
    })
});

let optionsOpen = false;

icon_dropdown.addEventListener('click', ()=>{
    if(optionsOpen == false){
        mainDropdown.classList.add('openByHeight');
        mainDropdown.classList.add('addShadow');
        mainDropdown.classList.remove('closeByHeight');
        mainDropdown.classList.remove('noShadow');
        optionsOpen = true;
    }
    else{
        mainDropdown.classList.remove('openByHeight');
        mainDropdown.classList.remove('addShadow');
        mainDropdown.classList.add('closeByHeight');
        mainDropdown.classList.add('noShadow');
        optionsOpen = false;
    }
});
