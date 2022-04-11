const SideBar = document.querySelector(".sideBar");
const SideNav = document.querySelector(".sideNav");
const dropdown = document.querySelector(".dropdown");
const ProfileMenu = document.querySelector(".profileMenu");
const LogOut = document.querySelector(".logout");
const ellipsis = document.querySelector(".fa-ellipsis");
const allActivities = document.querySelector(".allActivities");
const activity = document.querySelector(".activity");
const addActivity = document.querySelector(".addActivity");
const fa_angle_left = document.querySelector(".fa-angle-left");

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

let showActivities = false;

allActivities.addEventListener('click', (e)=>{
    if(showActivities == false){
        activity.classList.remove("hidden");
        activity.classList.add("DropDownAnime");
        fa_angle_left.style.transform = "rotate(180deg)";
        showActivities = true;
    }
    else{
        activity.classList.remove("DropDownAnime");
        activity.classList.add("hidden");
        fa_angle_left.style.transform = "rotate(0deg)";
        showActivities = false;
    }
});