const switchMode = document.querySelector('.switchMode');
const user_fullname = document.querySelector('.user_fullname');
const signout = document.querySelector('.signout');
const icon_dropdown = document.querySelector('.icon_dropdown');
const mainDropdown = document.querySelector('.mainDropdown');
const dashboardOptions = document.querySelectorAll('.dashboardOption');
const activitiesOptions = document.querySelectorAll('.activitiesOption');
const archiveOptions = document.querySelectorAll('.archiveOption');
const trashOptions = document.querySelectorAll('.trashOption');
const starredOptions = document.querySelectorAll('.starredOption');
const completeOptions = document.querySelectorAll('.completeOption');
const loader = document.querySelector('.loader');

let currentTheme = localStorage.getItem('Hazlo_Theme');
let usersFullname = null;
let users_username = null;

function showLoader(){
    loader.classList.add('show');
    loader.classList.remove('unshow');
}

function unshowLoader(){
    loader.classList.add('unshow');
    loader.classList.remove('show');
}

function showSection(section){
    switch (section) {
        case 'dashboard':
            showLoader();
            fetch('../api/getuseractivitycount.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "username": users_username
                })
            })
            .then(res=>res.json())
            .then((data)=>{
                if(data == "No Data Returned(All)"){
                    console.log("No Data");
                }
                else{
                    console.log(data);
                    let {ActivitiesCompleted, ActivitiesDue, ActivitiesStarred, ActivitiesTrashed, ActivitiesUnfinished, ArchivedActivities, TotalActivities} = data;
                    
                    unshowLoader();
                }
            })
            .catch((err)=>{console.log(err)});
            break;

        case 'activities':
            showLoader();
            
            break;

        case 'archives':
            showLoader();
            break;

        case 'trashbin':
            showLoader();
            break;

        case 'starred':
            showLoader();
            break;

        case 'completed':
            showLoader();
            break;
    
        default:
            console.log('Error!! No section added');
            break;
    }
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

    showSection('dashboard');

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
                usersFullname = fullname;
                users_username = username;
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

function switchFocus(element1, element2, element3, element4, element5, element6){
    element1.classList.add('active');
    element2.forEach((ele2)=>{
        ele2.classList.remove('active');
    });
    element3.forEach((ele3)=>{
        ele3.classList.remove('active');
    });
    element4.forEach((ele4)=>{
        ele4.classList.remove('active');
    });
    element5.forEach((ele5)=>{
        ele5.classList.remove('active');
    });
    element6.forEach((ele6)=>{
        ele6.classList.remove('active');
    });
}

dashboardOptions.forEach((dashboardOption)=>{
    dashboardOption.addEventListener('click', ()=>{
        switchFocus(dashboardOption, activitiesOptions, archiveOptions, trashOptions, starredOptions, completeOptions);
        showSection('dashboard');
    });
});

activitiesOptions.forEach((activitiesOption)=>{
    activitiesOption.addEventListener('click', ()=>{
        switchFocus(activitiesOption, dashboardOptions, archiveOptions, trashOptions, starredOptions, completeOptions);
        showSection('activities');
    });
});

archiveOptions.forEach((archiveOption)=>{
    archiveOption.addEventListener('click', ()=>{
        switchFocus(archiveOption, dashboardOptions, activitiesOptions, trashOptions, starredOptions, completeOptions);
        showSection('archives');
    });
});

trashOptions.forEach((trashOption)=>{
    trashOption.addEventListener('click', ()=>{
        switchFocus(trashOption, dashboardOptions, activitiesOptions, archiveOptions, starredOptions, completeOptions);
        showSection('trashbin');
    })
});

starredOptions.forEach((starredOption)=>{
    starredOption.addEventListener('click', ()=>{
        switchFocus(starredOption, dashboardOptions, activitiesOptions, trashOptions, archiveOptions, completeOptions);
        showSection('starred');
    })
});

completeOptions.forEach((completeOption)=>{
    completeOption.addEventListener('click', ()=>{
        switchFocus(completeOption, dashboardOptions, activitiesOptions, trashOptions, starredOptions, archiveOptions);
        showSection('completed');
    })
});
