const SideBar = document.querySelector(".sideBar");
const SideNav = document.querySelector(".sideNav");
const dropdown = document.querySelector(".dropdown");
const ProfileMenu = document.querySelector(".profileMenu");
const LogOut = document.querySelector(".logout");
const ellipsis = document.querySelector(".fa-ellipsis");
const allActivities = document.querySelectorAll(".allActivities");
const activities = document.querySelector(".activities");
const activity = document.querySelector(".activity");

let show = false;

LogOut.addEventListener('click', (e)=>{
    window.location = "../workarea/signout.php";
});

ellipsis.addEventListener('click', (e)=>{
    if(show == false){
        SideNav.style.transform = "translateX(0%)";
        show = true;
    }
    else{
        SideNav.style.transform = "translateX(-200%)";
        show = false;
    }
});

activitiesShow = false;

allActivities.forEach(allActs=>{
    allActs.addEventListener('click', (e)=>{
        if(activitiesShow == false){
            activities.style.display = "block";
            activity.style.display = "block";
            activitiesShow = true;
        }
        else{
            activities.style.display = "none";
            activity.style.display = "none";
            activitiesShow = false;
        }
    });
});